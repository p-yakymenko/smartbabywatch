<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord{

    public static function tableName(){
        return 'cart_items';
    }

}