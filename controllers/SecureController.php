<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\UserActiveRecord;
use app\models\UserRegisterForm;
use app\models\UserLoginForm;
use yii\helpers\Url;

class SecureController extends Controller{
    
    public $layout = 'generic';

    public function actionRegister(){
        $model = new UserRegisterForm;
        
        
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            //данные зашли
            
            // ! добавить валидацию мыла
            
            $user = new UserActiveRecord;
            $user->username = $model->email;
            $password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $user->password = $password_hash;

            $user->save();


        } else {
            // Выводим форму регистрации
            return $this->render('register', ['model' => $model]);
        }

        
    }

    // Функция входа
    public function actionLogin(){
        
        $model = new UserLoginForm;
        if($model->load(Yii::$app->request->post()) && $model->validate()){ // если данные введены и введенны правильно
            // проверить пользователя и залогинить его
            $email = $model->email; // берём мыло, введеённое в форме входа
            $password = $model->password; // берём введённый пароль

            $user = UserActiveRecord::find()->where(['username' => $email])->one(); // берём пользователя с таким мылом из базы
            
            if(empty($user)){
                // если такого пользователя нет ...
                echo 'Ошибка, пожалуйста, повторите запрос';
            } else {
                // проверяем сходится ли пароль
                
                
                $password_hash = $user->password; // получить хеш из базы
                $user_id = $user->id;
                
                if(Yii::$app->getSecurity()->validatePassword($password, $password_hash)){
                    // логиним пользователя
                    Yii::$app->user->login($user);
                    return $this->redirect(Url::to(['static/index']));
                    
                } else {
                    // отправляем на страницу входа с ошибкой "неправильный пароль"
                    echo 'Ошибка, повторите попытку';
                }
                
            }

        } else {
            // отображаем форму фхода
            return $this->render('login', ['model' => $model]);
        }
    }

    // Функция выхода
    public function actionLogout(){
        if(!Yii::$app->user->isGuest){
            Yii::$app->user->logout();
        }
        return $this->redirect(Url::to(['static/index']));
    }

    public function actionSetting(){
        
        return $this->render('profile_settings');
    }

}