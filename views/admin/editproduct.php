<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
?>

    ID продукта (системное значение, не подлежит изменению): <?= $item->id ?>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name')->label('Название*') ?>
        <?= $form->field($model, 'brand')->label('Бренд') ?>
        <?= $form->field($model, 'code')->label('Код') ?>
        <?= $form->field($model, 'price')->label('Цена*') ?>
        <?= $form->field($model, 'quantity')->label('Количество*') ?>
        <?= $form->field($model, 'description')->label('Описание')->textarea() ?>
        <?= $form->field($model, 'video')->label('Введите код видео с youtube (Пример: в ссылке https://www.youtube.com/watch?v=GsXok_8h5p4 кодом будет GsXok_8h5p4') ?>
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
        <!-- КОНЕЦ МОДАЛЬНОГО ОКНА НОВОГО ИЗОБРАЖЕНИЯ ДЛЯ ТОВАРА -->
    
    </div>
</div>

 <!-- БЛОК ГАЛЕРЕИ -->
<hr>
        <h4>Галерея</h4>
        <p>В этом разделе можно добавить дополнительные изображения для карточки товара</p>
        <!-- Вывести текущие изображения + возможность удалить их -->

        <style>
            .gallery_image{
                width: 100px;
            }
        </style>
        <?php
        // Цикл вывода картинок из галереи
        foreach($gallery_images as $gallery_image){
            echo Html::img($gallery_image->picture, ['class' => 'gallery_image']); ?>
            <a href="<?= Url::to(['admin/remove_gallery_image', 'gallery_image_id' => $gallery_image->id]) ?>">
                <div class="btn btn-danger">Удалить</div>
            </a>
            <br>
        <?php } // конец цикла вывода галереи ?>
        <br>
        <!-- Кнопка открытия модального окна / добавление новой картинки в галерею -->
        <button type="button" data-toggle="modal" data-target="#galleryModal" class="btn btn-success">Добавить изображение</div> <!-- открывает модальное окно добавления изображения галереи -->

            <!-- Модальное окно для галереи -->
            <div id="galleryModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Добавить новое изображение в галерею</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Форма добавления изображения в галерею -->
                            <?php $new_gallery_image = ActiveForm::begin([
                                'action' => Url::to(['admin/new_gallery_image', 'item_id' => $item->id]) ,
                                'options' => [
                                    'enctype' => 'multipart/form-data'
                                ]
                            ]) ?>
                                
                                <?= $new_gallery_image->field($new_gallery_image_model, 'imageFile')->fileInput() ?>
                                
                                <!-- Кнопка отправить-->
                                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                            <?php ActiveForm::end() ?>
                            <!-- Конец формы добавления изображения в галерею -->
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>    
            <!-- Конец модального окна для галереи -->

        


<!-- КОНЕЦ БЛОКА ГАЛЕРЕИ-->