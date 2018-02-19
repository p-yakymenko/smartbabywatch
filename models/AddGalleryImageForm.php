<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Items;
use app\models\GalleryImages;

class AddGalleryImageForm extends Model{

    public $imageFile;

    public function rules(){
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
        ];
    }

    public function upload(){ // Функция, непосредственно создающая файл на сервере

        if($this->validate()){
            $given_name = $this->imageFile->baseName;
            $given_extension = $this->imageFile->extension;
            // Получить уникальное имя
            $unique_name = $this->produce_unique_name($given_name, $given_extension);

            // Сохранить файл
            $this->imageFile->saveAs('uploads/'.$unique_name.'.'.$given_extension);
            // Вернуть путь к картинке
            return 'uploads/'.$unique_name.'.'.$given_extension;
        } else { // если предоставлено не валидное изображение (или не предоставлено сообщение вообще)
            return false;
        }

    }

    /*
    * Функция, которая проверяет уникальность имени и делает имя файла уникальным
    */
    private function produce_unique_name($given_name, $given_extension){
        $current_name = $given_name;
        while(!$this->check_if_name_is_unique($current_name, $given_extension)){// проверяем имя на уникальность
            $current_name = make_name_unique($current_name); // сделать имя уникальным 
        } // повторить
        
        return $current_name;
        
    }

    /*
    * Функция проверки имени на уникальность
    * Используется в produce_unique_name
    */
    private function check_if_name_is_unique($given_name, $given_extension){
        $row_to_check = 'uploads/'.$given_name.'.'.$given_extension;
        // Проверяем, на сколько таких файлов ссылается таблица товаров
        $item_check = Items::find()->where(['picture' => $row_to_check])->all();
        
        // Проверяем, на сколько таких файлов ссылается таблица галлереи
        $gallery_check = GalleryImages::find()->where(['picture' => $row_to_check])->all();

        // Если не найдено совпадений, возвращаем true
        if(empty($item_check) && empty($gallery_check)){
            return true;
        } else { // Если совпадения есть, возвращаем false
            return false;
        }

    }

    /*
    * Функция уникализации имени
    * Используется в produce_unique_name
    */
    private function make_name_unique($given_name){
        // генерируем рандомный символ
        $random_symbol = rand(0,9);
        return $given_name.$random_symbol; // возвращаем название с рандомной прибавкой
    }

}