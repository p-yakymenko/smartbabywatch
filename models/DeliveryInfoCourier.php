<?php

namespace app\models;

use Yii;
use yii\base\model;

class DeliveryInfoCourier extends Model{
    
    public $delivery_city;
    public $delivery_courier;
    public $delivery_fio;
    public $delivery_phone;
    public $delivery_comment;
    public $payment_method;

    public function rules(){

        return [
            [['delivery_city', 'delivery_courier', 'delivery_fio', 'delivery_phone', 'payment_method'], 'required'],
            [['delivery_comment'], 'default']
        ];

    }
}