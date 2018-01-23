<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Request;
use app\models\Items;
use app\models\AddProductForm;
use app\models\EditProductForm;

class AdminController extends Controller{
    public $layout = 'admin'; // Задаём формат представлений для этого контроллера


    // Список всех продуктов
    public function actionProducts(){

        $items = Items::find()->all();

        return $this->render('products', ['items' => $items]);
    }


    // Добавить новый продукт
    public function actionAddproduct(){
        $model = new AddProductForm();
        
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            // Блок кода, который выполняется, если форма была заполнена
            $new_item = new Items();
            $request = Yii::$app->request;
            $new_item->name = $model->name; // Заменить на данные из post
            $new_item->save();
            return $this->render('addproduct-success');
        } else {
            // Блок кода, если нет
            return $this->render('addproduct', ['model' => $model]);
        }
    }

    // Удалить продукт
    public function actionDeleteproduct($id){
              
        $item_to_delete = Items::findOne($id);
        $item_to_delete->delete();

        return $this->redirect(['admin/products']);
    }
    
    // Редактировать существующий продукт
    public function actionEditproduct($id){
        $model = new EditProductForm();
        $item_to_edit = Items::findOne($id);
        return $this->render('editproduct', ['item' => $item_to_edit, 'model' => $model]);
    }


}