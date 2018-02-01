<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
?>

    <h1>
        <?php if(isset($name)){
            echo $name;
        } ?>
    </h1>

    <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'title')->label('Название') ?>
        <?= $form->field($model, 'text')->textarea(['rows => 6'])->label('Текст') ?>

        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end() ?>
