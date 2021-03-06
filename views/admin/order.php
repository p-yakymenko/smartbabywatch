<?php
    // Вывод заказа
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

        
    <h1>Заказ № <?= $order->id ?></h1>
    <p>Текущий статус: <?= $order_statuses[$order->status] ?></p>
    <table class="table">
        <thead>
            <tr>
                <th>Товар</th>
                <th>Код</th>
                <th>Количество</th>
                <th>Цена за единицу</th>
                <th>Всего</th>
            </tr>
        </thead>
        
        <?php
            $summary_cost = 0;
            foreach($ordered_items as $ordered_item){ 
                $entry_cost = $ordered_item->quantity * $items[$ordered_item->item_id]['price'];
                $summary_cost += $entry_cost;
            ?>
            <tr>
                <td><?= $items[$ordered_item->item_id]['name'] ?></td>
                <td><?= $items[$ordered_item->item_id]['code'] ?></td>
                <td><?= $ordered_item->quantity ?> </td>
                <td><?= $items[$ordered_item->item_id]['price'] ?></td>
                <td><?= $entry_cost ?></td>
            </tr>
        <?php } // Конец foreach $ordered_items ?>
    </table>
    <p>Итого: <?= $summary_cost ?> рублей</p>
    
    <!-- ВЫВОД ИНФОРМАЦИИ О ДОСТАВКЕ -->
        
    <!-- Способ доставки -->
    <?php
        $delivery_methods = [1 => 'Самовывоз', 2 => 'Адресная доставка', 3 => 'Другой город'];
        echo 'Способ доставки: '.$delivery_methods[$order->delivery_method].'<br>';
    ?>
    <!-- Способ оплаты -->
    <?php
        $payment_methods = [1 => 'Наличными', 2 => 'Visa/MasterCard', 3 => 'Webmoney', 4 => 'Яндекс.Деньги'];
        echo 'Способ оплаты: '.$payment_methods[$order->payment_method].'<br>';

    ?>

    
    ФИО получателя: <?= $order->delivery_fio ?><br>
    Телефон получателя: <?= $order->delivery_phone_number ?><br>
    Комментарий: <?= $order->delivery_comment ?><br>
    <?php // опциональные поля для двух других способов доставки
        if($order->delivery_method == 2){ // Адерсная доставка
            echo 'Адрес: '.$order->delivery_address.'<br>';
        } else if ($order->delivery_method == 3){ // Другой город
            echo 'Город: '.$order->delivery_city.'<br>';
            echo 'Курьерская служба: '.$order->delivery_courier.'<br>';
        }
    ?>

    <!-- КОНЕЦ ВЫВОДА ИНФОРМАЦИИ О ДОСТАВКЕ -->
    
    <hr>
    <p><b>Управление заказом</b></p>
    <p>Сменить статус: </p>
    <!-- ФОРМА СМЕНЫ СТАТУСА -->
    <?php $form = ActiveForm::begin(); ?>
        
        <?php echo $form->field($model, 'status_id')->dropdownList($order_statuses,
        ['prompt' => 'Выберите статус']); ?>
        
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>


    <?php ActiveForm::end(); ?>


    <hr>
    <a href="<?= Url::to(['admin/orders']) ?>">
        <div class="btn btn-default">Вернуться</div>
    </a>
