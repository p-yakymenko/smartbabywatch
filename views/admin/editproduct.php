<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="container">
    ID продукта (системное значение, не подлежит изменению): <?= $item->id ?>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name')->label('Название') ?>
        <?= $form->field($model, 'brand')->label('Бренд') ?>
        <?= $form->field($model, 'code')->label('Код') ?>
        <?= $form->field($model, 'price')->label('Цена') ?>
        <?= $form->field($model, 'quantity')->label('Количество') ?>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
        
    <?php ActiveForm::end(); ?>

    Изображение: 
        <?= Html::img($item->picture) ?><br>
        <div class="btn btn-danger">Удалить изображение</div>
        <div class="btn btn-success">Загрузить новое изображение</div>

</div>