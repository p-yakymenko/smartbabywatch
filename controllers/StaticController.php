<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class StaticController extends Controller{
	
	public $layout = 'generic';
	
	public function actionIndex(){
		if(Yii::$app->user->isGuest){
			return $this->render('mainpage');
		} else {
			return $this->redirect(Url::to(['catalog/index']));
		}
	}
	
	
}