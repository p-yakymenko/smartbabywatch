<?php
    use yii\helpers\Html;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="http://gmpg.org/xfn/11">



        <link rel="stylesheet" href="style/css/bootstrap.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="style/css/bootstrap-datepicker.min.css">
        <?php $this->head() ?>
    </head>


    <body>
        <?php $this->beginBody() ?>
            
            <?= $content ?>

            <script src="vendor/jquery/jquery.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap-select.js"></script>
            <script src="vendor/bootstrap/js/bootstrap-datepicker.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap-datepicker.ru.min.js"></script>
        <?php $this->endBody() ?>
    </body>




</html>
<?php $this->endPage() ?>