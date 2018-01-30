<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Админка</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?= Url::to(['admin/products']) ?>">Товары</a></li>
            <li><a href="<?= Url::to(['admin/orders']) ?>">Заказы</a></li>
            <li><a href="<?= Url::to(['admin/news']) ?>">Новости</a></li>
        </ul>
    </div>
</nav>

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