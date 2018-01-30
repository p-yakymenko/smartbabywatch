<?php
    // Представления успешного добавления товара
    use yii\helpers\Url;
?>

<?php
    $url_to_ADD_PRODUCT = Url::to(['admin/addproduct']);
    $url_to_PRODUCTS = Url::to(['admin/products']);
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

    <a href="<?= $url_to_ADD_PRODUCT ?>">
        <button type="button" class="btn btn-success">    
            Добавить ещё один товар
        </button>
    </a>

    <a href="<?= $url_to_PRODUCTS ?>">
        <button type="button" class="btn btn-default">
            К списку продуктов
        </button>
    </a>

</div>