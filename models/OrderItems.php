<?php

namespace app\models;

use yii\db\ActiveRecord;

class OrderItems extends ActiveRecord{

    public static function tableName(){
        return 'order_items';
    }

}