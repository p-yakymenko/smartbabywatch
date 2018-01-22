<?php

namespace app\controllers;

use yii\web\Controller;

class OrderController extends Controller{

    public $layout = 'generic';

    public function actionMyorder(){
        return $this->render('myorder');
    }
    public function actionOrderstart(){
        return $this->render('profile_order_start');
    }
    public function actionOrderend(){
        return $this->render('profile_order_end');
    }
}