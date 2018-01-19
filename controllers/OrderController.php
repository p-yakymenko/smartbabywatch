<?php

namespace app\controllers;

use yii\web\Controller;

class OrderController extends Controller{

    public $layout = 'generic';

    public function actionMyOrder(){
        return $this->render('myorder');
    }
    public function actionOrderStart(){
        return $this->render('profile_order_start');
    }
    public function actionOrderEnd(){
        return $this->render('profile_order_end');
    }
}