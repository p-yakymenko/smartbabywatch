<?php

namespace app\controllers;

use yii\web\Controller;

class FooterController extends Controller{

    public $layout = 'generic';

    public function actionTermsofuse(){
        return $this->render('termsofuse');
    }
    public function actionPrivacy(){
        return $this->render('privacy');
    }
}