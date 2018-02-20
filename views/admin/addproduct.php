<?php
    // Страница добавления нового товара
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'name')->label('Название*') ?>
        <?= $form->field($model, 'brand')->label('Бренд') ?>
        <?= $form->field($model, 'code')->label('Код') ?>
        <?= $form->field($model, 'quantity')->label('Количество*') ?>
        <?= $form->field($model, 'price')->label('Цена*') ?>
        <?= $form->field($model, 'description')->label('Описание')->textarea() ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>
        <?= $form->field($model, 'video')->label('Введите код видео с youtube (Пример: в ссылке https://www.youtube.com/watch?v=GsXok_8h5p4 кодом будет GsXok_8h5p4') ?>
        
        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>        
        </div>


    <?php ActiveForm::end(); ?>
