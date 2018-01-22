<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>

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
				Заказ №2 - новый
			</h3>
			<div class="profile-top-button">
				<button type="submit" class="btn btn-border"><img src="style/img/icons/edit-blue.png" alt=""> Редактировать заказ</button>   
			</div>
		</div>
		
	
		<h5 class="form-title">Товары в заказе</h5>
 
		
		
			<div class="table-responsive">
				<table class="catalog-table table vertical-aling gray">
					<thead>
						<tr>
							<th class=""><div>№</div></th>
							<th class=""><div>Код</div></th>
							<th class=""><div>Наименование товара</div></th>
							<th class=""><div>Цена</div></th>
							<th class=""><div>Количество</div></th>
							<th class=""><div>Общая сумма</div></th>
							<th class=""><div>Статус</div></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>2</td>
							<td>
								123
							</td>
							<td>
								<div class="tovar-name tovar-name-auto">
									<img src="style/img/tovar.png" class="tovar-name-img" alt="">
									<a href="" class="tovar-name-title">Часы детские Smart Baby Watch Q50 (синие)</a>
								</div>
							</td>
							<td>123,45 руб</td>
							<td>
								1шт
							</td>
							<td><span class="font-bold">123,45 руб</span></td>
							<td><span class="tovar-status tovar-status-yes">добавлен</span></td>
						</tr>
						
					</tbody>
				</table>


			</div>
			
			
			<div class="rezerv-total">
				Итого: <span>2</span> товара на <span>246,90 руб</span>
			</div>

			<div class="row">
				<div class="col-md-5">
					<h5 class="form-title">Способ доставки</h5>
					<h5 class="form-title-small">Самовывоз</h5>
					<p class="form-text">Самовывоз осуществляется по адресу: 125315, г.Москва, Ленинградский проспект 80, корп 16, оф. 123</p>

					<div class="row">
						<div class="col-md-4">
							<div class="mini-block">
								<h6 class="mini-block-title">Дата приезда</h6>
								<p class="mini-block-text">01.02.2017</p>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-1">
							<div class="mini-block">
								<h6 class="mini-block-title">Время приезда </h6>
								<p class="mini-block-text">с 14 до 18 ч</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<h5 class="form-title">Способ оплаты</h5>
					<p class="font-bigger">Visa/MasterCard</p>
				</div>
			</div> 
		
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