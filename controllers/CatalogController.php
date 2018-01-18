<?php

namespace app\controllers;

use yii\web\Controller;

use app\models\Items; // наша ActiveRecord модель для работы с товарами

class CatalogController extends Controller{

    public $layout = 'generic';

    public function actionIndex(){
        $items = Items::find()->all();

        
        return $this->render('catalog', ['items' => $items]);
    }

}