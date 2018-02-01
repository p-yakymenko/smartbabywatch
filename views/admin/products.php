<?php
    // Страницы со списком продуктов в админке
    use yii\helpers\Html;
    use yii\helpers\Url;
?>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th></th>
                <th></th>

            </tr>
        </thead>

        <?php foreach($items as $item){ ?>
            <tr>
                <td><?= Html::encode($item->name) ?></td>
                <td>
                    <a href="<?= Url::to(['admin/editproduct', 'id' => $item->id]) ?>">
                        <button type="button" class="btn btn-default">Редактировать</button>
                    </a>
                </td>
                <td>
                    <a href="<?= Url::to(['admin/deleteproduct', 'id' => $item->id ]) ?>">
                        <button type="button" class="btn btn-danger">Удалить</button>
                    </a>
                </td>
        
            </tr>
        <?php } ?>

    </table>

    <?php $url_to_ADD_PRODUCT = Url::to(['admin/addproduct']); ?>

    <a href="<?= $url_to_ADD_PRODUCT ?>">
        <button type="button" class="btn btn-success">
            Добавить новый товар
        </button>
    </a>
