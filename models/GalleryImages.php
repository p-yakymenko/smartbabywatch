<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class GalleryImages extends ActiveRecord{

    

    public static function tableName(){
        return 'gallery_pictures';
    }


}