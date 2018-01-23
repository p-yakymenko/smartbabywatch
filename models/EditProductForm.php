<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EditProductForm extends Model{

    public $id;
    public $name;

    public function rules(){
        return [
            [['id','name'], 'required']
        ];
    }

}