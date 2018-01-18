<?php
	use yii\helpers\Html;
	
	/* @var $this yii\web\View */
	/* @var $content string */
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />

		<!-- Стили от плагинов -->
		<link rel="stylesheet" href="style/css/bootstrap.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" href="vendor/fontello/css/fontello.css">
		<link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="style/css/bootstrap-datepicker.min.css">
	
		<!-- Стиль -->
		<link rel="stylesheet" href="style/css/custom.css?v1.9">

		<?php $this->head() ?>
	</head>

	<body>
		<?php $this->beginBody() ?>
			
			<?= $content ?>		
		
		<?php $this->endBody() ?>
	</body>

</html>



<?php $this->endPage() ?>