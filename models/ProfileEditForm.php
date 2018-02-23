<?php

namespace app\models;

use yii\base\Model;

class ProfileEditForm extends Model{

    public $name;
    public $surname;
    public $fathers_name;
    public $email;
    public $phone_number;
    public $restock_notification;
    public $order_status_update_notification;
    public $newsletter;

    public function rules(){
        return [
            [['name', 'surname', 'email', 'phone_number', 'restock_notification', 'order_status_update_notification', 'newsletter'], 'required'],
            [['fathers_name'], 'default']
        ];
    }

}