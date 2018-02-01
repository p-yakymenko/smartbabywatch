<?php
    use yii\helpers\Url;
?>

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
