<?php
    // Страница добавления нового товара
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>


    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>        
    </div>


<?php ActiveForm::end(); ?>
