<?php

namespace app\models;

use yii\db\ActiveRecord;

class Delivery_method extends ActiveRecord{

    public static function tableName(){
        return 'delivery_methods';
    }


}