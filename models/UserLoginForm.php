<?php

namespace app\models;

use Yii;
use yii\base\model;

class UserLoginForm extends Model{
    public $email;
    public $password;

    public function rules(){
        return [
            [['email', 'password'], 'required']
        ];


    }

}