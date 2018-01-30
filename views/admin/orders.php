<?php
    use yii\helpers\Url;
?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Управление</th>
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
            </tr>
        <?php } ?>
    </table>


</div>