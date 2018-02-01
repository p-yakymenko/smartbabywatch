<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\base\Model;

class NewPicForm extends Model{
    public $new_picture;    

    public function rules(){
        return [
            [['new_picture'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
        ];
    }

    public function upload(){
        if($this->validate()){
            $this->new_picture->saveAs('uploads/'.$this->new_picture->baseName.'.'.$this->new_picture->extension);
            return 'uploads/'.$this->new_picture->baseName.'.'.$this->new_picture->extension;
        } else {
            return false;
        }
    }

}


