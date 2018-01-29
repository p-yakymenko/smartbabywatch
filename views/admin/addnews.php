<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
?>

<div class="container">

    <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'title')->label('Название') ?>
        <?= $form->field($model, 'text')->textarea(['rows => 6'])->label('Текст') ?>

        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end() ?>

    <hr>
    <a href="<?= Url::to(['admin/news']) ?>">
        <div class="btn btn-default">Вернуться</div>
    </a>

</div>