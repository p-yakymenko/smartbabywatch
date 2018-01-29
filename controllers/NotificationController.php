<?php

namespace app\controllers;

use yii\web\Controller;

class NotificationController extends Controller{
    
    public $layout = 'general';

    public function actionIndex(){
        echo 'Уведомления';
    }

}