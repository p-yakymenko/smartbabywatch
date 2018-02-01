<?php
    use yii\helpers\Url;
?>


<div class="container">
    <!-- Действующие акции -->
    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Дата создания</th>
                <th>Управление</th>
                <th></th>
            </tr>
        </thead>
        <?php foreach($promotions as $promotion){ ?>
            <tr>
                <td><?= $promotion->title ?></td>
                <td><?= $promotion->created_at ?></td>
                <td> <!-- Редактирование новости -->
                    <a href="<?= Url::to(['admin/edit_promotion', 'id' => $promotion->id]) ?>">
                        <div class="btn btn-primary">
                            Редактировать
                        </div>
                    </a>
                </td>
                <td><!-- Удаление новости -->
                    <a href="<?= Url::to(['admin/delete_promotion', 'id' =>$promotion->id ])?>">
                        <div class="btn btn-danger">
                            Удалить
                        </div>
                    </a>
                </td>

            </tr>
        <?php } ?>
    </table>


    <hr>
    
    <a href="<?= Url::to(['admin/add_promotion']) ?>">
        <div class="btn btn-default">Добавить новую акцию</div>
    </a>

</div>