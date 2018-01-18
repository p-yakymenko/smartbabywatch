<?php
namespace app\controllers;

use yii\web\Controller;

class SecureController extends Controller{
    
    public $layout = 'generic';

    public function actionRegister(){
        return $this->render('register');
    }

    public function actionLogin(){
        return $this->render('login');
    }

}