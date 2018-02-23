<?php

namespace app\models;

use Yii;
use yii\base\Model;

class NewPasswordForm extends Model{

    public $new_password;

    public function rules(){
        return [
            [['new_password'], 'required']
        ];
    }

}