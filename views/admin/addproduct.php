<?php
    // Страница добавления нового товара
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="container">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'name')->label('Название') ?>
        <?= $form->field($model, 'brand')->label('Бренд') ?>
        <?= $form->field($model, 'code')->label('Код') ?>
        <?= $form->field($model, 'quantity')->label('количество') ?>
        <?= $form->field($model, 'price')->label('Цена') ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>
        
        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>        
        </div>


    <?php ActiveForm::end(); ?>

</div>