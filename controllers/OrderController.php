<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

use app\models\UserActiveRecord;
use app\models\Orders;
use app\models\Payment_method;
use app\models\Delivery_method;
use app\models\Order_status;

class OrderController extends Controller{

    public $layout = 'generic';

    public function actionMyorders(){
        // Получить id пользователя
        $user_id = Yii::$app->user->id;
        $user = UserActiveRecord::findOne($user_id);
        $order_list = Orders::find()->where(['user_id' => $user_id])->all();
        
        $payment_methods = Payment_method::find()->all();
        foreach($payment_methods as $payment_method){
            $payment_array[$payment_method->id] = $payment_method->ru;
        }

        $delivery_methods = Delivery_method::find()->all();
        foreach($delivery_methods as $delivery_method){
            $delivery_array[$delivery_method->id] = $delivery_method->ru;
        }

        $order_status = Order_status::find()->all();
        foreach($order_status as $single_status){
            $status_array[$single_status->id] = $single_status->ru;
        }
        
        return $this->render('my_orders', [
            'user' => $user,
            'orders' => $order_list,
            'payment_methods' => $payment_array,
            'delivery_methods' => $delivery_array,
            'order_status' => $status_array
            ]);
    }

    public function actionDeleteorder($id){
        $order = Orders::findOne($id);
        $order->delete();
        return $this->redirect(Url::to(['order/myorders']));
    }
   
}