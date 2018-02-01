<?php
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
    <table class="table">
        <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Управление</th>
                <th></th><!-- Тут кнопка удалить заказ -->
            </tr>

        </thead>

        <?php foreach($orders as $order){ ?>
            <tr>
                <td>
                    <?= $order->id ?>
                </td>
                <td><!-- Кнопка редактировать заказ -->
                    <a href="<?= Url::to(['admin/order', 'id'=> $order->id]) ?>">    
                        <div class="btn btn-default">Редактировать</div>
                    </a>
                </td><!-- Конец кнопки редактировать -->
                <td>
                    <a href="<?= Url::to(['admin/deleteorder', 'id' => $order->id]) ?>">
                        <div class="btn btn-danger">Удалить</div>
                    </a>
                </td>

            </tr>
        <?php } ?>
    </table>


</div>