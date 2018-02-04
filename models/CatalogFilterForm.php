<?php

namespace app\models;

use Yii;
use yii\base\model;

class CatalogFilterForm extends Model{

    public $items_available;
    public $items_with_photo;

    public function rules(){
        return [
            [['items_available', 'items_with_photo'], 'required']
        ];
    }

}