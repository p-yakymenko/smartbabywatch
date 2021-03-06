<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\mail\MessageInterface;

use app\models\Items; // наша ActiveRecord модель для работы с товарами
use app\models\Cart; // Модель для работы с корзиной
use app\models\UserActiveRecord; // Модель для работы с пользователем
use app\models\News;
use app\models\Notifications; // ActiveRecord для таблицы уведомлений
use app\models\Promotions;
use app\models\Returns;
use app\models\ReturnCreateForm;
use app\models\Orders;
use app\models\OrderItems;
use app\models\Delivery_method;
use app\models\Payment_method;
use app\models\Order_status;
use app\models\CatalogFilterForm;
use app\models\SendMailForm; // форма для отправки мыла
use app\models\ProfileEditForm; // Форма редактирования профиля
use app\models\NewPasswordForm; // Форма нового пароля для аккаунта
// ActiveForm для способов доставки
use app\models\DeliveryInfoPickup; // самовывоз
use app\models\GalleryImages;
use app\models\TrackingForm;

class CatalogController extends Controller{

    public $layout = 'generic';

    /*
    * Главное действие - каталог товаров
    */
    public function actionIndex(){
        $this->user_check();
        $catalog_filter_form = new CatalogFilterForm;
        if($catalog_filter_form->load(Yii::$app->request->get()) && $catalog_filter_form->validate()){ // если форма в каталоге была использована
            // Получаем из базы информацию про товары с использованием информации из фильтра
            $where_clause = [];
            if($catalog_filter_form->items_available == 1){
                $where_clause = ['>', 'quantity', '0'];
            }
            $query = Items::find()->where($where_clause); // дальше $query используется при построении пагинации
        } else {
            // Получаем информацию обо всех товарах
            $query = Items::find(); // дальше $query используется при построении пагинации
        }

        $user_id = Yii::$app->user->id; // Получаем информацию о пользователе для дальнейшей работы

        // Заглушка на случай, если сюда попал не залогиненный пользователь
        if(Yii::$app->user->isGuest){
            return $this->redirect(['static/index']);
        }

        // Получаем последние новости для их вывода на странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        
        // Отрабатываем, был ли добавлен товар (по GET запросу)
        $request = Yii::$app->request;
        $item_to_add = $request->get('id');
        
        // Добавление товара в корзину
        if(!empty($item_to_add)){ // Если задан товар, который нужно добавить
            // Проверить - есть ли такой товар в корзине. Если есть - увеличить его количество
            
            // Добавляем товар
            $cart_item = new Cart;
            $cart_item->user_id = $user_id;
            $cart_item->item_id = $item_to_add; // !! Добавить проверку на валидность
            $cart_item->quantity = 1; // !! Добавить подхват количества
            $cart_item->save();
        }
        
        

        
        // Делаем пагинацию
        $count_for_pagination = $query->count();
        $pagination = new Pagination(['totalCount' => $count_for_pagination]);
        $pagination->pageSize=5;
        $items = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        $user = UserActiveRecord::findOne($user_id);
        
        $total_items_count = Items::find()->count(); // Получаем общее количество итемов в магазине для дальнейшего отображения

        return $this->render('catalog', [
            'items' => $items, 
            'user' => $user,
            'sidebar_news' => $latest_news,
            'pagination' => $pagination,
            'total_items_count' => $total_items_count, // Всего итемов в магазине
            'catalog_filter_form' => $catalog_filter_form
        ]);
    }

    /*
    * ДЕЙСТВИЯ С ОДНИМ ТОВАРОМ
    */

    /* Отобразить ОДИН товар */
    public function actionItem($id, $display = ''){
        $this->user_check();
        $item = Items::findOne($id); // Получаем информацию о товаре
        $user_id = Yii::$app->user->id;// Получаем информацию о пользователе
        $user = UserActiveRecord::findOne($user_id);
        if(Yii::$app->user->isGuest){ // Если пользователь не залогинен, отправить его домой
            return $this->redirect(['static/index']);            
        }

        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all(); // Получаем последние новости для их вывода на странице

        // Получаем картинки из галереи
        $gallery_images = GalleryImages::find()->where(['item_id' => $id])->all();
        return $this->render('item', [
            'item' => $item,
            'user' => $user,
            'sidebar_news' => $latest_news,
            'display' => $display,
            'gallery_images' => $gallery_images
        ]);
    }


    /*
    * КОНЕЦ ДЕЙСТВИЙ С ОДНИМ ТОВАРОМ
    */

    /*
    * Блок действий, обрабатывающих заказы
    */

    // Просмотр/изменение одного заказа
    public function actionEdit_order($id){
        $this->user_check();
        // Получаем информацию о заказе
        $order = Orders::findOne($id);

        // Получаем информацию об итемах, входящих в заказ
        $ordered_items = OrderItems::find()->where(['order_id' => $order->id])->all();

        // Получаем информацию обо всех итемах
        $items_data = Items::find()->all();
        foreach($items_data as $item_data_entry){ // Собираем информацию об итемах в ассоциативный массив
            $item_array[$item_data_entry->id]['name'] = $item_data_entry['name'];
            $item_array[$item_data_entry->id]['price'] = $item_data_entry['price'];
            $item_array[$item_data_entry->id]['code'] = $item_data_entry['code'];
            $item_array[$item_data_entry->id]['brand'] = $item_data_entry['brand'];
            $item_array[$item_data_entry->id]['quantity'] = $item_data_entry['quantity'];
            $item_array[$item_data_entry->id]['picture'] = $item_data_entry['picture'];

        } // Конец цикла сбора информации о предметах
        
        // Получаем информацию о способах доставки
        $delivery_methods = Delivery_method::find()->all();
        foreach($delivery_methods as $delivery_method){ // !! Собираем информацию в ассоциативный массив
            $delivery_methods_array[$delivery_method->id] = $delivery_method->ru;
        }

        // Получаем информацию о способах оплаты
        $payment_methods = Payment_method::find()->all();        
        foreach($payment_methods as $payment_method){ // !! СОбираем информацию в ассоциативный массив
            $payment_methods_array[$payment_method->id] = $payment_method->ru;
        }

        // Получаем инфморацию о статусах заказов
        $order_statuses = Order_status::find()->all();
        foreach($order_statuses as $order_status){
            $order_status_array[$order_status->id] = $order_status->ru;
        }

        // Получаем информацию о пользователе для представления
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);

        // Получаем последние новости для их вывода на странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        
        return $this->render('edit_order', [
            'user' => $user,
            'sidebar_news' => $latest_news,
            'order' => $order,
            'ordered_items' => $ordered_items,
            'item_data' => $item_array,
            'payment_methods' => $payment_methods_array,
            'delivery_methods' => $delivery_methods_array,
            'order_statuses' => $order_status_array
        ]);
    }

    // Подтвердить зарезервированный заказ
    public function actionReserve_to_confirmed($id){
        $this->user_check();
        $order = Orders::findOne($id); // Находим заказ
        $order->status = 1; // Заменяем статус на создан
        $order->save(); // Сохраняем заказ
        return $this->redirect(['order/myorders']); // Возвращаемся на страницу заказов
    }

    /*
    * Блок новостей и акций
    */

    // Все новости
    public function actionNews(){
        $news = News::find()->orderBy(['created_at' => SORT_DESC])->all();
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);
        
        // Получаем последние новости для их вывода на странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        
        return $this->render('news', ['news' => $news, 'user' => $user, 'sidebar_news' => $latest_news]);
    }

    // Просмотр одной новости
    public function actionNewsentry($id){
        $this->user_check();
        $news_entry = News::findOne($id);
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);

        // Получаем последние новости для их вывода на странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        

        return $this->render('news_entry', ['news_entry' => $news_entry, 'user' => $user, 'sidebar_news' => $latest_news]);
    }

    // Все акции
    public function actionPromotions(){
        $this->user_check();
        $promotions = Promotions::find()->orderBy(['created_at' => SORT_DESC])->all();
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);

        // Получаем последние новости для их вывода на странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        
        return $this->render('promotions', ['promotions' => $promotions, 'user' => $user, 'sidebar_news' => $latest_news]);
    }
    
    //Отдельная акция
    public function actionPromotion($id){
        $this->user_check();
        $promotion = Promotions::findOne($id);
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);

        // Получаем последние новости для их вывода на странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        

        return $this->render('news_entry', ['news_entry' => $promotion, 'user' => $user, 'sidebar_news' => $latest_news]);
    }

    /*
    * Блок уведомлений о товаре
    */

    // Отображение уведомлений
    public function actionMy_notifications(){
        $this->user_check();
        $user_id = Yii::$app->user->id; // Получаем пользователя для представления
        $user = UserActiveRecord::findOne($user_id);
        // Получаем последние новости для их вывода на сайдбаре странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        $notifications = Notifications::find()->where(['user_id' => $user_id])->all();
        $items = Items::find()->all();
        
        // Формиурем массив данных по товарам
        foreach($items as $item){
            $item_array[$item->id]['name'] = $item->name;
            $item_array[$item->id]['price'] = $item->price;
            $item_array[$item->id]['code'] = $item->code;
            $item_array[$item->id]['brand'] = $item->brand;
            $item_array[$item->id]['quantity'] = $item->quantity;
            $item_array[$item->id]['picture'] = $item->picture;

        }

        return $this->render('my_notifications', [
                'user' => $user,
                'sidebar_news' => $latest_news,
                'notifications' => $notifications,
                'items' => $item_array

            ]);
        
    }

    // Добавить в очередь уведомление о товаре
    public function actionNotification_add($item_id){
        $this->user_check();
        $user_id = Yii::$app->user->id;

        // Проверяем, нет ли уже такого активного уведомления
        $quantity_check = Notifications::find()->where(['user_id' => $user_id, 'item_id' => $item_id])->all();
        if(empty($quantity_check)){ // если такого уведомления нет
            $notification = new Notifications(); // то мы создаём такое уведомление
            $notification->user_id = $user_id;
            $notification->item_id = $item_id;
            $notification->save();
        }
        return $this->redirect(['catalog/index']); // и возвращаемся на страницу каталога

        
    }

    // Удалить уведомление
    public function actionNotification_remove($id){
        $this->user_check();
        $notification = Notifications::findOne($id);
        $notification->delete();
        return $this->redirect(['catalog/my_notifications']);

    }

    /*
    * Блок, отвечающий за возвраты
    */

    // Создать новый возврат
    public function actionReturn_create(){
        $this->user_check();
        $new_return_form = new ReturnCreateForm; // Форма возврата
        $user_id = Yii::$app->user->id; // Получаем пользователя для представления
        $user = UserActiveRecord::findOne($user_id);
        // Получаем последние новости для их вывода на сайдбаре странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        

        if($new_return_form->load(Yii::$app->request->post()) && $new_return_form->validate()){ // Если данные введены, добавляем товар для возврата
            $return = new Returns();
            $return->order_no = $new_return_form->order_number;
            $return->item_code = $new_return_form->item_code;
            $return->item_quantity = $new_return_form->item_quantity;
            $return->date = $new_return_form->date;
            $return->reason = $new_return_form->reason;
            $return->user = $user->username;
            $return->save();

            return $this->render('return_create', [ // И выводим ту же странцу с надписью "всё успешно"
                'model' => $new_return_form,
                'user' => $user,
                'sidebar_news' => $latest_news,
                'status_message' => 'Спасибо, заявка на возврат успешно создана!'
            ]); 
        } else { // Если данные введены не были, отображаем форму создания возврата
            return $this->render('return_create', ['model' => $new_return_form, 'user' => $user, 'sidebar_news' => $latest_news]);
        }
        
        
        
    }

    /*
    * БЛОК СТРАНИЦЫ ОТСЛЕЖИВАНИЯ СТАТУСА ЗАКАЗА
    */

    public function actionTrack(){
        $this->user_check();
        $tracking_form = new TrackingForm();
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();

        if($tracking_form->load(Yii::$app->request->post()) && $tracking_form->validate()){
            $order_no = $tracking_form->order_no;
            //проверяем, есть ли такой заказ и полуаем его статус
            $order = Orders::findOne($order_no);
            if(empty($order)){
                $order_status = 'Нет такого заказа';
            } else {
                $status_id = $order->status;
                $status_query = Order_status::findOne($status_id);
                $order_status = $status_query->ru;
            }
            
            return $this->render('track', [
                'user' => $user,
                'tracking_form' => $tracking_form,
                'sidebar_news' => $latest_news,
                'order_status' => $order_status
            ]);
        } else {
            return $this->render('track', [
                'user' => $user,
                'tracking_form' => $tracking_form,
                'sidebar_news' => $latest_news
            ]);
        }

    }

    /*
    * БЛОК УПРАВЛЕНИЯ ПРОФИЛЕМ
    */

    /* Настройки профиля */
    public function actionProfile_settings(){
        $this->user_check();
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        $profile_edit_form = new ProfileEditForm(); // Берём форму для изменения данных
        
        // валидация и обработка данных
        if($profile_edit_form->load(Yii::$app->request->post()) && $profile_edit_form->validate()){
            // Сохраняем данные
            $user->name = $profile_edit_form->name;
            $user->surname = $profile_edit_form->surname;
            $user->fathers_name = $profile_edit_form->fathers_name;
            $user->username = $profile_edit_form->email;
            $user->phone = $profile_edit_form->phone_number;
            $user->restock_notification = $profile_edit_form->restock_notification;
            $user->order_status_update_notification = $profile_edit_form->order_status_update_notification;
            $user->newsletter = $profile_edit_form->newsletter;
            $user->save();
            $new_pwd_form = new NewPasswordForm();
            return $this->render('profile_settings', [
                'user' => $user,
                'sidebar_news' => $latest_news,
                'profile_edit_form' => $profile_edit_form,
                'new_pass_form' => $new_pwd_form,
                'message' => 'Данные сохранены успешно!'
            ]);

        } else {
            // Наполянем форму данными из базы
            $profile_edit_form->name = $user->name;
            $profile_edit_form->surname = $user->surname;
            $profile_edit_form->fathers_name = $user->fathers_name;
            $profile_edit_form->email = $user->username;
            $profile_edit_form->phone_number = $user->phone;
            $profile_edit_form->restock_notification = $user->restock_notification;
            $profile_edit_form->order_status_update_notification = $user->order_status_update_notification;
            $profile_edit_form->newsletter = $user->newsletter;
            
            $new_pwd_form = new NewPasswordForm();
            return $this->render('profile_settings', [
                'user' => $user,
                'sidebar_news' => $latest_news,
                'new_pass_form' => $new_pwd_form,
                'profile_edit_form' => $profile_edit_form
            ]);
        }        
    }

    /* ФУНКЦИЯ ОБНОВЛЕНИЯ ПАРОЛЯ */
    public function actionNew_password(){
        $new_pwd_form = new NewPasswordForm();
        
        if($new_pwd_form->load(Yii::$app->request->post()) && $new_pwd_form->validate()){ // Валидация
            $password_hash = Yii::$app->getSecurity()->generatePasswordHash($new_pwd_form->new_password);
            $user_id = Yii::$app->user->id;
            $user = UserActiveRecord::findOne($user_id);
            $user->password = $password_hash;
            $user->save();
        }
        
        return $this->redirect(['catalog/profile_settings']);
    }
    
    /* DEPRECATED - настройки доставки теперь в заказе */
    // Управление настройками доставки
    public function actionDelivery_settings($delivery_method = ''){
        $this->user_check();
        $user_id = Yii::$app->user->id; // сбор данных о пользователе для отображения формы
        $user = UserActiveRecord::findOne($user_id); // получили id в предыдущей строке, теперь непосредственно получаем данные о пользователе
        
        if(empty($delivery_method)){ // если мы переходим по пустой ссылке, получаем активный способ доставки по юзеру из базы и делаем перенаправление
            $user_delivery_method = $user->delivery_method;
            return $this->redirect(['catalog/delivery_settings', 'delivery_method' => $user_delivery_method]);
        }
        
        // собираем формы для данных
        $pickup_form_model = new DeliveryInfoPickup;

        // Обрабатываем данные 
        if($delivery_method == 1){ // Если выбран самовывоз
            if($pickup_form_model->load(Yii::$app->request->post()) && $pickup_form_model->validate()){ // Загружаем данные и проверяем их валидность
                $user->delivery_method = 1;
                $user->delivery_fio = $pickup_form_model->delivery_fio;


            }
        } else if ($delivery_method == 2){ // Если выбрана адресная доставка

        } else { // Если выбрана курьерская доставка в другой город

        }

        // Вывод стандартной формы ввода данных для доставки
        return $this->render('delivery_settings', [
            'delivery_method' => $delivery_method,
            'pickup_form_model' => $pickup_form_model
        ]);
    }
    

    /*
    * БЛОК СТАТИЧЕСКИХ ТЕКСТОВЫХ СТРАНИЧЕК
    */

    // Страница гарантий
    public function actionGuarantee(){
        $this->user_check();
        // Получаем последние новости для их вывода на странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);
        return $this->render('guarantee', ['user' => $user, 'sidebar_news' => $latest_news]);
    }

    // Страница доставки
    public function actionDelivery(){
        $this->user_check();
        // Получаем последние новости для их вывода на странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);
        return $this->render('delivery', ['user' => $user, 'sidebar_news' => $latest_news]);
    }

    // Страничка помощи
    public function actionHelpdesk(){
        $this->user_check();
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);

         // Получаем последние новости для их вывода на странице
         $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();

        return $this->render('helpdesk', [
            'user' => $user,
            'sidebar_news' => $latest_news
        ]);
    }

    // Страничка "Пользовательское соглашение"
    public function actionUser_agreement(){
        $this->user_check();
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);

         // Получаем последние новости для их вывода на странице
         $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();

        return $this->render('user_agreement', [
            'user' => $user,
            'sidebar_news' => $latest_news
        ]);
    }


    // Страничка "Политика конфиденциальности"
    public function actionPrivacy_policy(){
        $this->user_check();
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);

         // Получаем последние новости для их вывода на странице
         $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();

        return $this->render('privacy_policy', [
            'user' => $user,
            'sidebar_news' => $latest_news
        ]);
    }


    /*
    * Блок странички с отправкой мыла
    */

    public function actionSend_mail(){
        $this->user_check();
        // Получаем данные о пользователе для представления
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);

        // Берём модель для формы отправки мыла
        $mail_send_form_model = new SendMailForm();

        if($mail_send_form_model->load(Yii::$app->request->post()) && $mail_send_form_model->validate()){ // Если введены данные, отрабатывает письмо
            // получаем из информации о пользователе его email
            $email_from = $user->username; // login = email
            Yii::$app->mailer->compose()
                ->setFrom($email_from)
                ->setTo('yackimenko.pavel@gmail.com')
                ->setSubject('Вопрос с сайта smartbabywatch')
                ->setTextBody($mail_send_form_model->mail_text)
                ->send();
            return $this->redirect(['catalog/index']); ; // И возвращаемся к каталогу
        } else { // или же
            // Выводим стандартную форму
            return $this->render('send_mail',
                [
                    'user' => $user,
                    'mail_send_form' => $mail_send_form_model
                ]
            );
        }

        
    }

    /*
    * Конец блока странички отправки мыла
    */

    /*
    * Сервисные функции
    */

    // Страница проверки, залогинен ли пользователь
    private function user_check(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['static/index']);
        }
    }
}