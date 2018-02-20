<?php
    use yii\helpers\Url;
?>

<h1>Страница возвратов</h1>

<!-- Таблица возвратов -->
<table class="table">
    <thead>
        <tr>
            <th>Номер заказа</th>
            <th>Дата</th>
            <th>Причина</th>
            <th>Артикул товара</th>
            <th>Количество товара</th>
            <th></th> <!-- Контактные данные-->
            <th></th> <!-- Кнопка удалить -->
        </tr>
    </thead>
    <tbody>
        <?php foreach($reclamations as $reclamation_entry){ ?>
            
            <tr>
                <td><!-- Номер заказа-->
                    <?= $reclamation_entry->order_no ?>
                </td>
                <td><!-- Дата -->
                    <?= $reclamation_entry->date ?>
                </td>
                <td><!-- Причина -->
                    <?= $reclamation_entry->reason ?>
                </td>
                <td><!-- Артикул товара -->
                    <?= $reclamation_entry->item_code ?>
                </td>
                <td><!-- Количество товара -->
                    <?= $reclamation_entry->item_quantity ?>
                </td>
                <td><!-- Контакт -->
                    <?= $user_list[$reclamation_entry->user] ?>
                </td>
                <td><!-- Кнопка "Удалить" -->
                    <a href="<?= Url::to(['admin/reclamation_delete', 'reclamation_id' => $reclamation_entry->id]) ?>">
                        <div class="btn btn-danger">Удалить</div>
                    </a>
                </td>
            </tr>            
        <?php } // end foreach ?>
    </tbody>
</table>
<!-- Конец таблицы возвратов -->