<?php

namespace app\models;

use yii\db\ActiveRecord;

class Payment_method extends ActiveRecord{

    public static function tableName(){
        return 'payment_methods';
    }
    
}