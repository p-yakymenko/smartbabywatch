<?php

namespace app\models;

use yii\base\Model;

class OrderStatusAlterForm extends Model{
    
    public $status_id;

    public function rules(){
        return [
            [['status_id'], 'required']
        ];
    }

}