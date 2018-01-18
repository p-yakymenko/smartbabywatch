<?php

namespace app\controllers;

use yii\web\Controller;

class CatalogController extends Controller{

    public $layout = 'generic';

    public function actionIndex(){
        return $this->render('catalog');
    }

}