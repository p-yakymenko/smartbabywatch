<?php

namespace app\controllers;

use yii\web\Controller;

class RestController extends Controller{

    public $layout = 'generic';

    public function actionDeliver(){
       return $this->render ('deliver');
    }

    public function actionEmail(){
    return $this->render ('email');
    }

    public function actionGarant(){
        return $this->render ('garant');
    }

    public function actionNews(){
        return $this->render ('news');
    }

    public function actionShares(){
        return $this->render ('shares');
    }

}