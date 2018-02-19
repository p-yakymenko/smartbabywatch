<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Request;
use yii\web\UploadedFile;
use yii\helpers\Url;
use app\models\Items;
use app\models\UserActiveRecord;
use app\models\News;
use app\models\Orders;
use app\models\Cart;
use app\models\Payment_method;
use app\models\Delivery_method;
use app\models\AddProductForm;
use app\models\EditProductForm;
use app\models\NewsEntryForm;
use app\models\OrderItems;
use app\models\OrderStatusAlterForm;
use app\models\Order_status;
use app\models\NewPicForm;
use app\models\Promotions;
use app\models\Notifications;
use app\models\Returns;
use app\models\AddGalleryImageForm;
use app\models\GalleryImages;

class AdminController extends Controller{
    public $layout = 'admin'; // Задаём формат представлений для этого контроллера


    // Список всех продуктов
    public function actionProducts(){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $items = Items::find()->all();

        return $this->render('products', ['items' => $items]);
    }


    // Добавить новый продукт
    public function actionAddproduct(){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $model = new AddProductForm();
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $pic_path = $model->upload();
            
            $new_item = new Items();
            $new_item->name = $model->name;
            $new_item->brand = $model->brand;
            $new_item->code = $model->code;
            $new_item->quantity = $model->quantity;
            $new_item->price = $model->price;
            $new_item->picture = $pic_path;
            $new_item->description = $model->description;
            $new_item->save();
            return $this->render('addproduct-success');
        } else {
            // Блок кода, если нет
            return $this->render('addproduct', ['model' => $model]);
        }
    }

    // Удалить продукт
    public function actionDeleteproduct($id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        // сначала удаляем каскадом такие же товары из корзины и заказов
        Cart::deleteAll(['item_id' => $id]);
        Notifications::deleteAll(['item_id' => $id]);
        OrderItems::deleteAll(['item_id' => $id]);

        // когда упоминаний о товаре нету, удаляем его из таблицы
        $item_to_delete = Items::findOne($id);
        $item_to_delete->delete();

        // и возвращаемся на страницу продуктов
        return $this->redirect(['admin/products']);
    }
    
    /*
    * ========== БЛОК КАРТОЧКИ ТОВАРА ==========
    */

    /*
    * Редактировать существующий продукт
    */ 
    public function actionEditproduct($id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $model = new EditProductForm(); // Форма редактирования основных сведений о товаре
        
        $item_to_edit = Items::findOne($id);
        
        // Валидация данных
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            // Сохранение введённых данных
            $item_to_edit->name = $model->name;
            $item_to_edit->brand = $model->brand;
            $item_to_edit->code = $model->code;
            $item_to_edit->quantity = $model->quantity;
            $item_to_edit->price = $model->price;
            $item_to_edit->description = $model->description;
            $item_to_edit->video = $model->video;
            $item_to_edit->save();
            return $this->redirect(Url::to(['admin/products']));
        } else {
            // Выводим стандартную форму
            $model->name = $item_to_edit->name;
            $model->brand = $item_to_edit->brand;
            $model->code = $item_to_edit->code;
            $model->quantity = $item_to_edit->quantity;
            $model->price = $item_to_edit->price;
            $model->description = $item_to_edit->description;
            $model->video = $item_to_edit->video;
            $new_pic_form = new NewPicForm(); // Форма добавления новой главной картинки
            $new_gallery_image_model = new AddGalleryImageForm(); // Форма добавления новой картинки в галлерею

            // Получаем список картинок из галлереи
            $item_gallery = GalleryImages::find()->where(['item_id' => $id])->all();


            return $this->render('editproduct', [
                'item' => $item_to_edit,
                'model' => $model,
                'new_pic_model' => $new_pic_form,
                'new_gallery_image_model' => $new_gallery_image_model,
                'gallery_images' => $item_gallery // Изображения для галлереи
            ]);
        }
    }

    /*
    * Добавление новой картинки в галерею (Блок карточки товара)
    * Вызывается из модального окна в карточке товара
    */
    public function actionNew_gallery_image($item_id){
        if(!$this->admin_check()){ // Проверка, является ли пользователь админом
            return $this->redirect(['static/index']);
        }

        // логика добавления картинки
        $model = new AddGalleryImageForm();
        if(Yii::$app->request->isPost){
            // ...
            $model->load(Yii::$app->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $pic_path = $model->upload(); // загружаем картинку
            // сохраняем новое вхождение в базе
            $new_gallery_entry = new GalleryImages();
            $new_gallery_entry->item_id = $item_id;
            $new_gallery_entry->picture = $pic_path;
            $new_gallery_entry->save();
        }
        // возвращаемся на страницу редактирования товара
        return $this->redirect(['admin/editproduct', 'id' => $item_id]);

    }

    /*
    * Удаление картинки из галереи (Блок карточки товара)
    * Вызывается из карточки товара
    */
    public function actionRemove_gallery_image($gallery_image_id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        
        $gallery_image_entry = GalleryImages::findOne($gallery_image_id);
        $item_id = $gallery_image_entry->item_id;
        unlink($gallery_image_entry->picture); // Удаляем картинку
        $gallery_image_entry->delete(); // Удаляем вхождение в базе
        return $this->redirect(['admin/editproduct', 'id' => $item_id]);
    }
  
    /*
    * Удалить текущую картинку на товаре
    */
    public function actionRemovepic($id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
       // Удалить путь к картинке
        $item = Items::findOne($id);
        $current_picture = $item->picture;
        $item->picture = '';
        $item->save();

        // Удалить картинку, если ни один другой товар не ссылается на неё
        // Проверяем, используется ли эта картинка где-то
        $pic_check = Items::find()->where(['picture' => $current_picture])->all();
        if(empty($pic_check)){
            unlink($current_picture);
        }
        return $this->redirect(['admin/editproduct', 'id'=>$id]);
       
    }

    // Загрузить новую картинку для товара
    public function actionNewpic($item_id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $new_pic_model = new NewPicForm;
        if(Yii::$app->request->isPost){
            $new_pic_model->load(Yii::$app->request->post());
            $new_pic_model->new_picture = UploadedFile::getInstance($new_pic_model, 'new_picture');
            $pic_path = $new_pic_model->upload(); // Загружаем картинку и получаем путь к ней
            // изменяем путь в базе
            $item = Items::findOne($item_id);
            $item->picture = $pic_path;
            $item->save();

        }

        return $this->redirect(['admin/editproduct', 'id' => $item_id]);
    }

    /* 
    * БЛОК УПРАВЛЕНИЯ НОВОСТЯМИ 
    */
    // Отображает все текущие новости
    public function actionNews(){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $news = News::find()->all();
        return $this->render('all_news', ['news' => $news]);
    }

    public function actionAddnews(){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $model = new NewsEntryForm();
        
        if($model->load(Yii::$app->request->post()) && $model->validate()){ // Валидация
            // Обработка введённых данных
            $new_news_entry = new News();
            $new_news_entry->title = $model->title;
            $new_news_entry->text = $model->text;
            $new_news_entry->save();
            return $this->redirect(['admin/news']);
        } else {
            // Вывести обычную форму ввода
            return $this->render('addnews', ['model' => $model]);
        }

            
    }
    
    // Редактирование одной новости
    public function actionEditnews($id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $model = new NewsEntryForm();
        $news_entry = News::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->validate()){ // Если были введены данные
            $news_entry->title = $model->title; // Сохраняем новые введённые данные
            $news_entry->text = $model->text;
            $news_entry->save();
            return $this->redirect(['admin/news']); // И возвращаемся на страницу с новостями
        } else { // Если данных нет 
            
            $model->title = $news_entry->title;
            $model->text = $news_entry->text;
            return $this->render('addnews', ['model' => $model]);
        }

    }

    public function actionDeletenews($id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $news_entry = News::findOne($id);
        $new_entry->delete();
        return $this->redirect(['admin/news']);
    }

    /* БЛОК УПРАВЛЕНИЯ ЗАКАЗАМИ */
    // Отобразить все заказы
    public function actionOrders(){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $orders = Orders::find()->all();
        $users = UserActiveRecord::find()->all();
        $payment_methods = Payment_method::find()->all();
        $delivery_methods = Delivery_method::find()->all();
        return $this->render('orders', [
            'orders' => $orders,
            'users' => $users,
            'payment_methods' => $payment_methods,
            'delivery_methods' => $delivery_methods
            ]);
    }

    // Управление одним заказом
    public function actionOrder($id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $model = new OrderStatusAlterForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){ // проверяем, зашли ли данные
            $order = Orders::findOne($id);
            $order->status = $model->status_id;
            $order->save();
            
            return $this->redirect(['admin/order', 'id' => $id]);
        }
        // или выводим сам заказ
        $order = Orders::findOne($id);
        $items = Items::find()->all();
        foreach($items as $item){
            $item_array[$item->id]['name'] = $item->name;
            $item_array[$item->id]['price'] = $item->price;
            $item_array[$item->id]['code'] = $item->code;
            $item_array[$item->id]['brand'] = $item->brand;
            $item_array[$item->id]['quantity'] = $item->quantity;
        }
        $user = UserActiveRecord::findOne($order->user_id);
        $order_statuses = Order_status::find()->all();
        foreach($order_statuses as $order_status){
            $order_status_array[$order_status->id] = $order_status->ru;
        }
        $ordered_items = OrderItems::find()->where(['order_id' => $order->id])->all();
        
        return $this->render('order', [
            'order' => $order,
            'ordered_items' => $ordered_items,
            'items' => $item_array,
            'order_statuses' => $order_status_array,
            'model' => $model
        ]);
    }
    
    // Удаление заказа
    public function actionDeleteorder($id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        // Удалить итемы из другой таблицы, чтобы не засорять
        $ordered_items = OrderItems::find()->where(['order_id' => $id])->all();
        foreach($ordered_items as $ordered_item){
            $ordered_item->delete();
        }
        //Удаляем непосредственно заказ
        $order = Orders::findOne($id);
        $order->delete();
        return $this->redirect(['admin/orders']);
    }

    /*==================================================
    * Блок АКЦИЙ 
    ===================================================*/ 
    
    public function actionDisplay_promotions(){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $promotions = Promotions::find()->orderBy(['created_at' => SORT_DESC])->all();
        return $this->render('all_promotions', ['promotions' => $promotions]);
    }

    /* Добавить новую акцию */
    public function actionAdd_promotion(){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $model = new NewsEntryForm(); // Используем ту же модель для формы - нужны одинаковые поля: тайтл и непосредственно текст
        
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $new_promotion = new Promotions();
            $new_promotion->title = $model->title;
            $new_promotion->text = $model->text;
            $new_promotion->save();
            return $this->redirect(['admin/display_promotions']);
        }

        return $this->render('addnews', [
            'model' => $model,
            'name' => "Добавить акцию"
        ]);
    }

    /* Редактировать существующую акцию */
    public function actionEdit_promotion($id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $model = new NewsEntryForm(); // Используем ту же форму, что и для новостей
        $promotion = Promotions::findOne($id);
        // Если данные даны
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            // Сохраняем новые данные
            $promotion->title = $model->title;
            $promotion->text = $model->text;
            $promotion->save();
            return $this->redirect(['admin/display_promotions']);
        }

        // Вывод обычной формы        
        
        
        $model->title = $promotion->title;
        $model->text = $promotion->text;
        return $this->render('addnews', ['model'=> $model]);
    }

    /* Удалить существующую акцию */
    public function actionDelete_promotion($id){
        if(!$this->admin_check()){
            return $this->redirect(['static/index']);
        }
        $promotion = Promotions::findOne($id);
        $promotion->delete();
        return $this->redirect(['admin/display_promotions']);
    }

    /*
    * Функции для внутреннего использования
    */

    /*
    * Проверка, залогинен ли пользователь, и является ли он администратором
    */
    private function admin_check(){
        if(Yii::$app->user->isGuest){ // если пользователь не залогинен
            return false;
        } else { // если пользователь залогинен
            $user_id = Yii::$app->user->id;
            $user = UserActiveRecord::findOne($user_id);
            if($user->access_rights == 200){ // и является админом
                return true;
            } else { // не является админом
                return false;
            }
        }  
    }

}