<?php

namespace app\controllers;

use yii\web\Controller;

class StaticController extends Controller{
	
	public $layout = 'generic';
	
	public function actionIndex(){
		return $this->render('mainpage');
	}
	
	
}