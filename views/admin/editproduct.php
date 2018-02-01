<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
?>

    ID продукта (системное значение, не подлежит изменению): <?= $item->id ?>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name')->label('Название') ?>
        <?= $form->field($model, 'brand')->label('Бренд') ?>
        <?= $form->field($model, 'code')->label('Код') ?>
        <?= $form->field($model, 'price')->label('Цена') ?>
        <?= $form->field($model, 'quantity')->label('Количество') ?>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
        
    <?php ActiveForm::end(); ?>

    Изображение: 
        <?= Html::img($item->picture) ?><br>
        
        <a href="<?= Url::to(['admin/removepic', 'id' => $item->id]) ?>">
            <div class="btn btn-danger">Удалить изображение</div>
        </a>
        
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Загрузить новое изображение</button>

        <!-- Модальное окно добавления изображения -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Загрузка нового изображения</h4>
            </div>
            <div class="modal-body">
                <!-- Форма добавления новой картинки-->
                <?php $new_pic_form = ActiveForm::begin(['action' => Url::to(['admin/newpic', 'item_id' => $item->id]), 'options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?= $new_pic_form->field($new_pic_model, 'new_picture')->fileInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-default']) ?>
                    </div>

                <!-- Конец формы-->
                <?php ActiveForm::end(); ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

  </div>
</div>
