<?php

namespace app\models;

use Yii;
use yii\base\model;

class SendMailForm extends Model{

    public $mail_text;

    public function rules(){
        return [
            [['mail_text'], 'required']
        ];
    }

}