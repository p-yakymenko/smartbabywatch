<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use app\models\Cart;
use app\models\UserActiveRecord;
use app\models\Items;
use app\models\Orders;
use app\models\OrderItems;
use app\models\DeliveryInfoPickup; // Форма ввода данных для самовывоза
use app\models\DeliveryInfoAddress; // Форма ввода данных для адресной доставки
use app\models\DeliveryInfoCourier; // Форма ввода данных для доставки в другой город

class CartController extends Controller{

    public $layout = 'generic';

    /*
    *   Просмотр корзины
    */
    public function actionView(){
        $user_id = Yii::$app->user->id;
        

        $items_in_cart = Cart::find()->where(['user_id' => $user_id])->all(); // Получаем все товары из корзины для этого пользлвателя

        // Собираем данные с таблицы для представления
        $user = UserActiveRecord::findOne($user_id); // О пользователе
        $items_catalogue = Items::find()->all(); // О товаре
        // Собираем ассоциативный массив с информацией о товарах в формате id => название
        foreach($items_catalogue as $item_entry){
            $item_array[$item_entry->id]['name'] = $item_entry->name;
            $item_array[$item_entry->id]['price'] = $item_entry->price;
            $item_array[$item_entry->id]['code'] = $item_entry->code;
        }

        return $this->render('cart_overview', ['user' => $user, 'cart_content' => $items_in_cart, 'item_array' => $item_array]);
    }

    // Удалить товар из корзины
    public function actionRemoveentry($id){
        $cart_entry = Cart::findOne($id);
        $cart_entry->delete();
        return $this->redirect(Url::to(['cart/view']));
    }

    // Ввод и утверждение данных для доставки
    // Вызывается из окна корзины по нажатию "оформить заказ" или "в резерв"
    public function actionDelivery_credentials($status=''){
        // Если данные были введены, создаём заказ и перенаправляем на новую страничку
        $pickup_model = new DeliveryInfoPickup;
        if($status == 1){ // Отработка данных из формы для самвывоза
            if($pickup_model->load(Yii::$app->request->post()) && $pickup_model->validate()){ // Проверяем валидность данных из формы
                $order_id = $this->create_order($status);// Создаём заказ и получаем его id
                $order = Orders::findOne($order_id);
                $order->delivery_fio = $pickup_model->delivery_fio;
                $order->delivery_phone_number = $pickup_model->delivery_phone;
                $order->delivery_comment = $pickup_model->delivery_comment();
                $order->save();
                return $this->redirect(['cart/success']);
            }
        }
        
        // Собираем формы данных о доставке для представления
        $delivery_info_form_pickup = new DeliveryInfoPickup(); // самовывоз

        return $this->render('cart_delivery_credentials', [
            'pickup_form_model' => $delivery_info_form_pickup,
            'delivery_method' => 1 // Стандартно выбираем самовывоз
        ]);


    }

    // САМОВЫВОЗ - страница ввода информации
    public function actionDelivery_pickup($status = ''){ // Статус отражает резерв или не резерв
        $form_model = new DeliveryInfoPickup;

        if($form_model->load(Yii::$app->request->post()) && $form_model->validate()){ // Если введены валидные данные
            $order_id = $this->create_order($status); // Создаём заказ и получаем его айди
            $order = Orders::findOne($order_id);
            $order->delivery_method = 1; // Добавляем данные из формы о способах доставки
            $order->delivery_fio = $form_model->delivery_fio;
            $order->delivery_phone_number = $form_model->delivery_phone;
            $order->delivery_comment = $form_model->delivery_comment;
            $order->payment_method = $form_model->payment_method;
            $order->save();
            return $this->render('cart_success', ['order_id' => $order_id]);
        }

        return $this->render('delivery_pickup', [
            'model' => $form_model,
            'status' => $status
        ]);
    }

    // АДРЕСНАЯ ДОСТАВКА (тот же город) - страница ввода информации
    public function actionDelivery_address($status = ''){ // Статус = резерв или не резерв
        $form_model = new DeliveryInfoAddress;

        if($form_model->load(Yii::$app->request->post()) && $form_model->validate()){ // Если введены валидные данные
            $order_id = $this->create_order($status); // Создаём заказ и получаем его айди
            $order = Orders::findOne($order_id);
            $order->delivery_method = 2; // Добавляем данные из формы о способах доставки
            $order->delivery_address = $form_model->delivery_address;
            $order->delivery_fio = $form_model->delivery_fio;
            $order->delivery_phone_number = $form_model->delivery_phone;
            $order->delivery_comment = $form_model->delivery_comment;
            $order->payment_method = $form_model->payment_method;
            $order->save();
            return $this->render('cart_success', ['order_id' => $order_id]);
        }

        return $this->render('delivery_address', ['model' => $form_model, 'status' => $status]);
    }

    // КУРЬЕРСКАЯ ДОСТАВКА В ДРУГОЙ ГОРОД - страница ввода инфы + обработка и создание заказа
    public function actionDelivery_courier($status = ''){
        $form_model = new DeliveryInfoCourier;
        
        if($form_model->load(Yii::$app->request->post()) && $form_model->validate()){ // Если введены валидные данные
            $order_id = $this->create_order($status); // Создаём заказ и получаем его айди
            $order = Orders::findOne($order_id);
            $order->delivery_method = 3; // Добавляем данные из формы о способах доставки
            $order->delivery_city = $form_model->delivery_city;
            $order->delivery_courier = $form_model->delivery_courier;
            $order->delivery_fio = $form_model->delivery_fio;
            $order->delivery_phone_number = $form_model->delivery_phone;
            $order->delivery_comment = $form_model->delivery_comment;
            $order->payment_method = $form_model->payment_method;
            $order->save();
            return $this->render('cart_success', ['order_id' => $order_id]);
        }
        return $this->render('delivery_courier', ['model' => $form_model, 'status' => $status]);
    }

    // Страничка "Всё хорошо, заказ создан"
    public function actionSuccess($order_id = ''){
        echo 'Заказ '.$order_id.' создан успешно';
    }

    // Создание заказа    
    private function create_order($status = ''){
        // Создаём заказ
        $order = new Orders();
        $user_id = Yii::$app->user->id; // Получаем айди текущего пользователя
        $user = UserActiveRecord::findOne($user_id); // Получаем пользователя и берём из него способ доставки и оплаты
        $order->user_id = $user_id;
        if($status == ''){ // Дефолтное создание заказа
            $order->status = 1;
        } else if ($status == 'reserve'){ // Заказ откладываем в резерв
            $order->status = 2;
        }
        $order->delivery_method = $user->delivery_method;
        $order->payment_method = $user->payment_method;

        $order->save();
        // Получаем id только что созданного заказа
        $created_order_id = $order->id;

        // Сохраняем итемы из корзины в заказ
        $items_in_cart = Cart::find()->where(['user_id' => $user_id])->all();
        foreach($items_in_cart as $cart_entry){ // Перебираем все товары из корзины
            // Сохраняем их в заказы
            $order_item = new OrderItems();
            $order_item->order_id = $created_order_id;
            $order_item->item_id = $cart_entry->item_id;
            $order_item->quantity = $cart_entry->quantity;
            $order_item->save();
            $cart_entry->delete(); // Очистить корзину
        }
        
        return $created_order_id;

    }

}