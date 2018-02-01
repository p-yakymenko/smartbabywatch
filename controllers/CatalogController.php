<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;

use app\models\Items; // наша ActiveRecord модель для работы с товарами
use app\models\Cart; // Модель для работы с корзиной
use app\models\UserActiveRecord; // Модель для работы с пользователем
use app\models\News;
use app\models\Notifications; // ActiveRecord для таблицы уведомлений

class CatalogController extends Controller{

    public $layout = 'generic';

    public function actionIndex(){
        
        $user_id = Yii::$app->user->id; // Получаем информацию о пользователе для дальнейшей работы

        // Заглушка на случай, если сюда попал не залогиненный пользователь
        if(Yii::$app->user->isGuest){
            return $this->redirect(['static/index']);
        }

        // Получаем последние новости для их вывода на странице
        $latest_news = News::find()->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        
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
        $query = Items::find();
        // Делаем пагинацию
        $count_for_pagination = $query->count();
        $pagination = new Pagination(['totalCount' => $count_for_pagination]);
        $pagination->pageSize=5;
        $items = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        $user = UserActiveRecord::findOne($user_id);
        
        return $this->render('catalog', ['items' => $items, 'user' => $user, 'news' => $latest_news, 'pagination' => $pagination]);
    }

    public function actionNews(){
        $news = News::find()->all();
        return $this->render('news', ['news' => $news]);
    }

    // Просмотр одной новости
    public function actionNewsentry($id){
        $news_entry = News::findOne($id);
        return $this->render('news_entry', ['news_entry' => $news_entry]);
    }

    // Добавить в очередь уведомление о товаре
    public function actionNotification_add($item_id){
        $user_id = Yii::$app->user->id;
        // Проверяем, нет ли уже такого активного уведомления
        $quantity_check = Notifications::find()->where(['user_id' => $user_id, 'item_id' => $item_id])->all();
        if(empty($quantity_check)){ // если такого уведомления нет
            $notification = new Notifications(); // то мы создаём такое уведомление
            $notification->user_id = $user_id;
            $notification->item_id = $item_id;
            $notification->save();
        }
        return $this->redirect(['catalog/index']); // и возвращаемся на страницу каталога

        
    }

}