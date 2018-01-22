<?php

namespace app\controllers;

use yii\web\Controller;

class ProductController extends Controller{

    public $layout = 'generic';

    public function actionCatalog(){
        return $this->render('catalog');
    }
    public function actionCatalognotify(){
        return $this->render('catalog_notify');
    }
    public function actionCatalogreturn(){
        return $this->render('catalog_return');
    }
    public function actionRezerv(){
        return $this->render('rezerv');
    }
    public function actionTrack(){
        return $this->render('track');
    }
    public function actionPreview(){
        return $this->render('profile_preview');
    }
}