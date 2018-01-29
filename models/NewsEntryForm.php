<?php

namespace app\models;

use Yii;
use yii\base\Model;

class NewsEntryForm extends Model{

    public $title;
    public $text;

    public function rules(){
        return [
            [['title'], 'required'],
            [['text'], 'required']
        ];
    }

}
