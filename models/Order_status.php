<?php

namespace app\models;

use yii\db\ActiveRecord;

class Order_status extends ActiveRecord{

    public static function tableName(){
        return 'order_status';
    }

}