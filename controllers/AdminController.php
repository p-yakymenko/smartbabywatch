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
use app\models\Payment_method;
use app\models\Delivery_method;
use app\models\AddProductForm;
use app\models\EditProductForm;
use app\models\NewsEntryForm;
use app\models\OrderItems;
use app\models\OrderStatusAlterForm;
use app\models\Order_status;

class AdminController extends Controller{
    public $layout = 'admin'; // Задаём формат представлений для этого контроллера


    // Список всех продуктов
    public function actionProducts(){

        $items = Items::find()->all();

        return $this->render('products', ['items' => $items]);
    }


    // Добавить новый продукт
    public function actionAddproduct(){
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
            $new_item->save();
            return $this->render('addproduct-success');
        } else {
            // Блок кода, если нет
            return $this->render('addproduct', ['model' => $model]);
        }
    }

    // Удалить продукт
    public function actionDeleteproduct($id){
              
        $item_to_delete = Items::findOne($id);
        $item_to_delete->delete();

        return $this->redirect(['admin/products']);
    }
    
    // Редактировать существующий продукт
    public function actionEditproduct($id){
        $model = new EditProductForm();
        $item_to_edit = Items::findOne($id);
        
        // Валидация данных
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            // Сохранение введённых данных
            $item_to_edit->name = $model->name;
            $item_to_edit->brand = $model->brand;
            $item_to_edit->code = $model->code;
            $item_to_edit->quantity = $model->quantity;
            $item_to_edit->price = $model->price;
            $item_to_edit->save();
            return $this->redirect(Url::to(['admin/products']));
        } else {
            // Выводим стандартную форму
            $model->name = $item_to_edit->name;
            $model->brand = $item_to_edit->brand;
            $model->code = $item_to_edit->code;
            $model->quantity = $item_to_edit->quantity;
            $model->price = $item_to_edit->price;
            return $this->render('editproduct', ['item' => $item_to_edit, 'model' => $model]);
        }
    }
  
    // Удалить текущую картинку на товаре
    public function actionRemovepic($id){
        echo 'test';
    }

    // Загрузить новую картинку для товара
    public function actionNewpic($id){
        echo 'test2';
    }

    /* БЛОК УПРАВЛЕНИЯ НОВОСТЯМИ */
    // Отображает все текущие новости
    public function actionNews(){
        $news = News::find()->all();
        return $this->render('all_news', ['news' => $news]);
    }

    public function actionAddnews(){
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

    public function actionEditnews($id){

    }

    public function actionDeletenews($id){
        $news_entry = News::findOne($id);
        $new_entry->delete();
        return $this->redirect(['admin/news']);
    }

    /* БЛОК УПРАВЛЕНИЯ ЗАКАЗАМИ */
    // Отобразить все заказы
    public function actionOrders(){
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
    
    public function actionDeleteorder($id){
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

}