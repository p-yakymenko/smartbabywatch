<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class AddProductForm extends Model{

    public $name;
    public $brand;
    public $code;
    public $quantity;
    public $price;
    public $description;
    public $video;
    /**
    * @var UploadedFile
    */
    public $imageFile;

    public function rules(){
        return [
            [['name'], 'required'],
            [['brand'], 'required'],
            [['code'], 'required'],
            [['quantity'], 'required'],
            [['price'], 'required'],
            [['description'], 'default'],
            [['video'], 'default'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
        ];
    }

    public function upload(){
        
        if($this->validate()){
            
            $this->imageFile->saveAs('uploads/'.$this->imageFile->baseName.'.'.$this->imageFile->extension);
            return 'uploads/'.$this->imageFile->baseName.'.'.$this->imageFile->extension;
        } else {
            return false;
        }
    }
}