<?php
    // Представления успешного добавления товара
    use yii\helpers\Url;
?>

<?php
    $url_to_ADD_PRODUCT = Url::to(['admin/addproduct']);
    $url_to_PRODUCTS = Url::to(['admin/products']);
?>

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