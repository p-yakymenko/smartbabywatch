<?php
    // Страница добавления нового товара
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
            <li><a href="<?= Url::to(['catalog/index']) ?>">Вернуться на сайт</a></li>
        </ul>
    </div>
</nav>

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