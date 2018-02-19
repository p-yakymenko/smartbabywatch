<?php

namespace app\models;

use Yii;
use yii\base\model;

class DeliveryInfoAddress extends Model{

    public $delivery_address;
    public $delivery_fio;
    public $delivery_phone;
    public $delivery_comment;
    public $payment_method;

    public function rules(){
        return [
            [['delivery_address','delivery_fio','delivery_phone', 'payment_method'], 'required'],
            [['delivery_comment'], 'default']

        ];
    }

}