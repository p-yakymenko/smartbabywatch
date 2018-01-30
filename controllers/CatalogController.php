<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

use app\models\Items; // наша ActiveRecord модель для работы с товарами
use app\models\Cart; // Модель для работы с корзиной
use app\models\UserActiveRecord; // Модель для работы с пользователем
use app\models\News;

class CatalogController extends Controller{

    public $layout = 'generic';

    public function actionIndex(){
        
        $user_id = Yii::$app->user->id; // Получаем информацию о пользователе для дальнейшей работы

        // Заглушка на случай, если сюда попал не залогиненный пользователь
        if(Yii::$app->user->isGuest){
            return $this->redirect(['static/index']);
        }
        
        // Отрабатываем, был ли добавлен товар (по GET запросу)
        $request = Yii::$app->request;
        $item_to_add = $request->get('id');
        
        if(!empty($item_to_add)){ // Если задан товар, который нужно добавить
            // Проверить - есть ли такой товар в корзине. Если есть - увеличить его количество
                        
            // Добавляем товар
            $cart_item = new Cart;
            $cart_item->user_id = $user_id;
            $cart_item->item_id = $item_to_add; // !! Добавить проверку на валидность
            $cart_item->quantity = 1; // !! Добавить подхват количества
            $cart_item->save();
        }
        
        

        // Получаем из базы информацию для представления
        $items = Items::find()->all();
        $user = UserActiveRecord::findOne($user_id);
        
        return $this->render('catalog', ['items' => $items, 'user' => $user]);
    }

    public function actionNews(){
        $news = News::find()->all();
        return $this->render('news', ['news' => $news]);
    }

    public function actionNewsentry($id){
        $news_entry = News::findOne($id);
        return $this->render('news_entry', ['news_entry' => $news_entry]);
    }

}