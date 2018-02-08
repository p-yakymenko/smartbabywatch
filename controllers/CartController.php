<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

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

    public function actionRemoveentry($id){
        $cart_entry = Cart::findOne($id);
        $cart_entry->delete();
        return $this->redirect(Url::to(['cart/view']));
    }

    // Ввод и утверждение данных для доставки
    // Вызывается из окна корзины по нажатию "оформить заказ" или "в резерв"
    public function actionDelivery_credentials($status=''){
        // Собираем формы данных о доставке
        // ....
        $delivery_info_form_pickup = new DeliveryInfoPickup();

        return $this->render('cart_delivery_credentials', [
            'pickup_form' => $delivery_info_form_pickup
        ]);


    }

    public function actionCreateorder($status = ''){
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
        
        return $this->redirect(Url::to(['catalog/index']));

    }

}