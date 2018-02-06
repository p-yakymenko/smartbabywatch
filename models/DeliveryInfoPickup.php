<?php

namespace app\models;

use Yii;
use yii\base\model;

class DeliveryInfoPickup extends Model{

    public $delivery_fio;
    public $delivery_phone;
    public $delivery_comment;

    public function rules(){
        return [
            [['delivery_fio','delivery_phone', 'delivery_comment'], 'required']
        ];

    }

}