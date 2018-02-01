<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

    <table class="table">
        <?php foreach($news as $news_entry){ ?>
            <tr>
                <td>
                    <?= $news_entry->title ?>
                </td>
                <td>
                    <a href="<?= Url::to(['admin/editnews', 'id' => $news_entry->id]) ?>">
                        <div class="btn btn-default">
                            Редактировать
                        </div>
                    </a>
                    <a href="<?= Url::to(['admin/deletenews', 'id' => $news_entry->id]) ?>">
                        <div class="btn btn-danger">
                            Удалить
                        </div>
                    </a>
                </td>
            </tr>
        <?php } // end foreach ?>
    </table>
    <hr>
    <a href="<?= Url::to(['admin/addnews']) ?>">
        <div class="btn btn-success">
            Добавить новость
        </div>
    </a>
