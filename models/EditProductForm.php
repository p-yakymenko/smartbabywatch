<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EditProductForm extends Model{

    public $id;
    public $name;
    public $brand;
    public $code;
    public $price;
    public $quantity;
    public $description;
    public $video;

    public function rules(){
        return [
            [['name'], 'required'],
            [['brand'], 'required'],
            [['code'], 'required'],
            [['price'], 'required'],
            [['quantity'], 'required'],
            [['description'], 'default'],
            [['video'], 'default']
        ];
    }

}