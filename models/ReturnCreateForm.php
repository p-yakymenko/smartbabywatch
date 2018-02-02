<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ReturnCreateForm extends Model{

    public $order_number;
    public $item_code;
    public $item_quantity;
    public $date;
    public $reason;

    public function rules(){
        return [
            [[
                'order_number',
                'item_code',
                'item_quantity',
                'date',
                'reason'
            ],
            'required']
        ];
    }

}