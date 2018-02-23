<?php

namespace app\models;

use Yii;
use yii\base\Model;

class TrackingForm extends Model{

    public $order_no;

    public function rules(){
        return [
            [['order_no'], 'required']
        ];
    }

}