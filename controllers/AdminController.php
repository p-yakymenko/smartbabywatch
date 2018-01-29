<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Request;
use yii\web\UploadedFile;
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
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $pic_path = $model->upload();
            
            $new_item = new Items();
            $new_item->name = $model->name;
            $new_item->brand = $model->brand;
            $new_item->code = $model->code;
            $new_item->quantity = $model->quantity;
            $new_item->price = $model->price;
            $new_item->picture = $pic_path;
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