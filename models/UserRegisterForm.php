<?php

namespace app\models;

use Yii;
use yii\base\model;

class UserRegisterForm extends Model{

    public $email;
    public $password;
    public $password_repeat; // Проверка на то, чтобы пароль был введён правильно
    public $name;
    public $surname;
    public $fathers_name; // Необязательное поле
    public $phone_number;

    public $newsletter_subscription;
    public $terms_accepted;

    public $captcha;

    public function rules(){
        return [
            [
                [
                    'email',
                    'password',
                    'password_repeat',
                    'name',
                    'surname',
                    'phone_number',
                    //'newsletter_subscription',
                    'terms_accepted'
                ],
                'required',
                ],
        ];
    }


}