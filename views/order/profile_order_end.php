<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<title>Title</title>
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

</head>

<body> 
	<header class="header">
	<div class="container header-container">
		<div class="header-col-logo">
			<a><img src="style/img/logo.png" alt="" class="header-logo"></a>
		</div>
		<div class="header-col-desc">
			<span class="header-desc">Детские часы-телефон с GPS трекером</span>
		</div>
		<div class="header-col-phone">
			<a class="header-phone"><img src="style/img/icons/phone.png" alt="">8 (495) 995-77-89</a>
		</div>
		<div class="header-col-button">
			<a href="" class="btn btn-blue header-button">Заказать звонок</a>
		</div>
		<div class="header-col-work">
			<span class="header-work">Пн-Пт с 8:30 до 17:30 по МСК</span>
			<span class="header-work">Сб и Вс – выходной</span>
		</div>
		<div class="header-col-login" >
			<?php $url_to_reg = Url::to(['secure/register'])?>
			<?php $url_to_log = Url::to(['secure/login'])?>
			<a href="<?= $url_to_log ?>"><img src="style/img/icons/out.png" alt="">Вход</a>
			<a href="<?= $url_to_reg ?>"><img src="style/img/icons/user.png" alt="">Регистрация</a>
		</div>
		<div class="header-col-basket" style="display: none">
			<div class="header-basket">
				<div class="header-basket-ico">
					<img src="style/img/icons/basket-big.png" alt="">
					<span class="header-basket-total">1</span>
				</div>
				<div class="header-basket-totalsum">
					<h4>на сумму: 1234,56 руб</h4>
					<a href="" class="header-basket-issue">Оформить заказ</a>
				</div>
			</div>
		</div>
	</div>
</header>

	<section class="section-wrap">
	<div class="container">
		<div class="catalog-user-menu">
	<div class="catalog-user-left">
		<?php $url_to_email = Url::to(['rest/email'])?>
		<?php $url_to_profile = Url::to(['product/preview'])?>
		<a href="<?= $url_to_profile ?>" class="catalog-user-link wow fadeInUp">Профиль и настройки</a>
		<a href="" class="catalog-user-link wow fadeInUp" data-wow-delay="0.2s">Помощь</a>
		<a href="<?= $url_to_email ?>" class="catalog-user-link wow fadeInUp" data-wow-delay="0.1s">Написать письмо</a>	
	</div>
	<div class="catalog-user-right wid wow fadeInUp" data-wow-delay="0.3s">
		<span>Добро пожаловать, Иван Петров</span>
		<a href="">Выйти</a>
	</div>
</div>

		<div class="profile-top profile-top-man">
			<div class="profile-top-ico">
				<img src="style/img/icons/home.png" alt="">
			</div>
			<div class="profile-top-sep">/</div>
			<h3 class="profile-top-title">
				Профиль и настройки
			</h3>
		</div>
		

		
	     
		<form action="/" method="post">
			<div class="row">
				<div class="col-md-5">
					<h5 class="form-title">Выберите способ доставки</h5>
					
					<ul  class="nav nav-pills nav-pills-merge nav-pills-block margin nav-order">
						<li class="active">
							<a href="#1b" data-toggle="tab">Самовывоз</a>
						</li>
						<li class="">
							<a href="#2b" data-toggle="tab">Адресная доставка</a>
						</li>
						<li class="">
							<a href="#3b" data-toggle="tab">Другой город</a>
						</li> 
					</ul>
					
					<div class="tab-content clearfix">
						<div class="tab-pane active" id="1b">

							<div class="order-loaction">
								<div class="order-loaction-text">
									Самовывоз осуществляется по адресу: 125315, г.Москва, Ленинградский проспект 80, корп 16, оф. 123
								</div>
								<div class="order-loaction-ico">
									<img src="style/img/icons/location-2.png" alt="">
								</div>
							</div>
							
							
							<div class="row form-group">
								<div class="col-md-4">
									<div class="form-group">
										<label>Дата приезда <span class="form-label-important">*</span></label>
										<input type="text" class="form-control form-input form-input-date datepicker" placeholder="дд/мм/гг">
									</div>
								</div>
								<div class="col-md-8">
									<label>Время приезда</label>
									<div class="row form-row-center form-row-center-nowrap">
										<div class="col-md-1">
											с
										</div>
										<div class="col-md-5">
											
												<input type="text" class="form-control form-input">
											
										</div>
										<div class="col-md-1">
											до
										</div>
										<div class="col-md-5">
											
												<input type="text" class="form-control form-input">
											
										</div>
									</div>
								</div>
							</div>
							<div class="row form-group">
								
								<div class="col-md-8">
									<label>ФИО получателя <span class="form-label-important">*</span></label>
									<input type="text" class="form-control form-input">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-8">
									<label>Телефон получателя <span class="form-label-important">*</span></label>
									<input type="text" class="form-control form-input">
								</div>
							</div>


							<div class="form-group">
								<label>Комментарий</label>
								<textarea class="form-control form-input" rows="8"></textarea>
							</div>

						</div>

						<div class="tab-pane" id="2b">
							
							

							<div class="order-loaction">
								<div class="order-loaction-text">
									Самовывоз осуществляется по адресу: 125315, г.Москва, Ленинградский проспект 80, корп 16, оф. 123
								</div>
							</div>
							
							<div class="form-group">
								<label>Адрес  <span class="form-label-important">*</span></label>
								<textarea class="form-control form-input" rows="5"></textarea>
							</div>
							
							<div class="row form-group">
								<div class="col-md-4">
									<div class="form-group">
										<label>Дата приезда <span class="form-label-important">*</span></label>
										<input type="text" class="form-control form-input form-input-date" placeholder="дд/мм/гг">
									</div>
								</div>
								<div class="col-md-8">
									<label>Время приезда</label>
									<div class="row form-row-center form-row-center-nowrap">
										<div class="col-md-1">
											с
										</div>
										<div class="col-md-5">
											
												<input type="text" class="form-control form-input">
											
										</div>
										<div class="col-md-1">
											до
										</div>
										<div class="col-md-5">
											
												<input type="text" class="form-control form-input">
											
										</div>
									</div>
								</div>
							</div>
							<div class="row form-group">
								
								<div class="col-md-8">
									<label>ФИО получателя <span class="form-label-important">*</span></label>
									<input type="text" class="form-control form-input">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-8">
									<label>Телефон получателя <span class="form-label-important">*</span></label>
									<input type="text" class="form-control form-input">
								</div>
							</div>


							<div class="form-group">
								<label>Комментарий</label>
								<textarea class="form-control form-input" rows="8"></textarea>
							</div>

						</div>
						<div class="tab-pane" id="3b">
							
							

							<div class="order-loaction">
								<div class="order-loaction-text">
									Самовывоз осуществляется по адресу: 125315, г.Москва, Ленинградский проспект 80, корп 16, оф. 123
								</div>
							</div>
							
							
							<div class="row form-group">
								<div class="col-md-8">
									<label>Перевозчик <span class="form-label-important">*</span></label>
									<select class="form-control form-input">
										<option value="">Выберите перевозчика</option>
									</select>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-8">
									<label>Отделение <span class="form-label-important">*</span></label>
									<select class="form-control form-input">
										<option value="">Выберите перевозчика</option>
									</select>
								</div>
							</div>

							<label>Адрес получения </label>

							<div class="order-loaction order-loaction-center">
								<div class="order-loaction-text">
									ул. Пушкина, д.123, оф 123, тел:123-456-789, тел: 123-456-780
								</div>
								<div class="order-loaction-ico">
									<img src="style/img/icons/location-2.png" alt="">
								</div>
							</div>
							
							<div class="row form-group">
								<div class="col-md-4">
									<div class="">
										<label>Дата приезда <span class="form-label-important">*</span></label>
										<input type="text" class="form-control form-input form-input-date" placeholder="дд/мм/гг">
									</div>
								</div>
								<div class="col-md-8">
									<label>Время приезда</label>
									<div class="row form-row-center form-row-center-nowrap">
										<div class="col-md-1">
											с
										</div>
										<div class="col-md-5">
											
												<input type="text" class="form-control form-input">
											
										</div>
										<div class="col-md-1">
											до
										</div>
										<div class="col-md-5">
											
												<input type="text" class="form-control form-input">
											
										</div>
									</div>
								</div>
							</div>
							<div class="row form-group">
								
								<div class="col-md-8">
									<label>ФИО получателя <span class="form-label-important">*</span></label>
									<input type="text" class="form-control form-input">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-8">
									<label>Телефон получателя <span class="form-label-important">*</span></label>
									<input type="text" class="form-control form-input">
								</div>
							</div>


							<div class="form-group">
								<label>Комментарий</label>
								<textarea class="form-control form-input" rows="8"></textarea>
							</div>

						</div>
					</div>

				</div>

				<div class="col-md-5 col-md-offset-1">
					<h5 class="form-title">Личные данные</h5>
					

					<div class="radio">
						<input type="radio" id="t-option1" name="selector">
						<label for="t-option1">Наличными</label>
					</div>
					<div class="radio">
						<input type="radio" id="t-option2" name="selector" checked>
						<label for="t-option2">Visa/Mastercard</label>
					</div>
					<div class="radio">
						<input type="radio" id="t-option3" name="selector">
						<label for="t-option3">Webmoney</label>
					</div>
					<div class="radio">
						<input type="radio" id="t-option4" name="selector">
						<label for="t-option4">Яндекс.Деньги</label>
					</div>

					
				</div>
			</div>
			
			<div class="form-bottom-with-back form-button-margin">
				<div>
					<a href="" class="form-back-link"><img src="style/img/icons/back-blue.png" class="form-back-link-ico" alt=""> Вернуться назад</a>
				</div>
				<div><button type="submit" class="btn btn-blue">Завершить оформление</button></div>
			</div>
			
		</form>
	</div>
</section>
 

	<footer class="section-footer clearfix">
	<div class="container">
		<div class="footer-top">
			<div class="footer-col-desc">
				<p class="footer-desc wow fadeInUp">
					Smart Baby Watch - это новинка в мире электронных гаджетов - умные часы , созданные с заботой о вас и ваших близких. Уникальность этого продукта в том, что
				</p>
			</div>
			<div class="footer-col-location">
				<div class="footer-location wow fadeInUp" data-wow-delay="0.1s">
					<img src="style/img/icons/pin.png" alt="">
					<span>125315, г.Москва, Ленинградский проспект 80, корп 16, оф. 123</span>
				</div>
			</div>
			<div class="footer-col-phone">
				<a class="footer-phone wow fadeInUp"><img src="style/img/icons/phone.png" alt="">8 (495) 995-77-89</a>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="footer-col-corp wow fadeInUp">
				<p>Copyright © ООО "Смарт Бэби Вотч" 2017. Все права защищены</p>
			</div>
			<div class="footer-col-politic">
				<a href="" class="footer-link wow fadeInUp" data-wow-delay="0.2s">Пользовательское соглашение</a>
			</div>
			<div class="footer-col-cond">
				<a href="" class="footer-link wow fadeInUp" data-wow-delay="0.1s">Политика конфиденциальности</a>
			</div>
			<div class="footer-col-social">
				<ul class="footer-social wow fadeInUp">
					<li><a href=""><img src="style/img/social/vk.png" alt=""></a></li>
					<li><a href=""><img src="style/img/social/facebook.png" alt=""></a></li>
					<li><a href=""><img src="style/img/social/ok.png" alt=""></a></li>
					<li><a href=""><img src="style/img/social/pin.png" alt=""></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
	
	<!-- Наши плагины -->
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap-select.js"></script>
<script src="vendor/bootstrap/js/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap-datepicker.ru.min.js"></script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/swiper/js/swiper.jquery.js"></script>


<!-- Свои скрипты -->
<script src="style/js/custom.js?v1.7"></script>
</body>
</html>