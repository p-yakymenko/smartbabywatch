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
	
	<section class="section-catalog">
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
		 
		<div class="catalog-container">
			<div class="row">
				<div class="col-md-3 col-sm-4">
					<div class="sidebar wow fadeInLeft" data-wow-delay="0.1s">
						<div class="sidebar-col-one">
							<div class="sidebar-menu-title">Товары и заказы</div>

							<div class="sidebar-menu">
								<	ul class="sidebar-menu-list">
									<?php $url_to_catalog = Url::to(['product/catalog'])?>
									<?php $url_to_oreders = Url::to(['product/track'])?>
									<?php $url_to_rezerv = Url::to(['product/rezerv'])?>
									<?php $url_to_return = Url::to(['product/catalogreturn'])?>
									<?php $url_to_info = Url::to(['product/catalognotify'])?>
									<li><a href="<?= $url_to_catalog ?>">Каталог товаров</a></li>
									<li><a href="<?= $url_to_oreders ?>">Мои заказы</a></li>
									<li><a href="<?= $url_to_rezerv ?>">Мои резервы</a></li>
									<li><a href="<?= $url_to_return ?>">Возврат товара</a></li>
									<li><a href="<?= $url_to_info ?>">Уведомления о товаре</a></li>
								</ul>
							</div>
						</div>
						
						<div class="sidebar-col-two">
							<div class="sidebar-menu-title">Информация</div>

							<div class="sidebar-menu sidebar-menu-two">
								<ul class="sidebar-menu-list">
									<?php $url_to_deliver = Url::to(['rest/deliver'])?>
									<?php $url_to_garant = Url::to(['rest/garant'])?>
									<?php $url_to_news = Url::to(['rest/news'])?>
									<?php $url_to_shares = Url::to(['rest/shares'])?>
									<li><a href="<?= $url_to_deliver ?>">Доставка и оплата</a></li>
									<li><a href="<?= $url_to_shares ?>">Акции производителей</a></li>
									<li><a href="<?= $url_to_garant ?>">Гарантии и сервис</a></li>
									<li><a href="<?= $url_to_news ?>">Новости</a></li>
								</ul>
							</div>
						</div>
						
						<div class="sidebar-col-thee">
							<div class="sidebar-menu-title">Последние новости</div>

							<ul class="sidebar-news">
								<li><span class="sidebar-news-date">03 мая 2017 в 11:48</span><a href=""  class="sidebar-news-link">ВТБ подтвердил высокую позицию в Нацрейтинге корпоративного управления</a></li>
								<li><span class="sidebar-news-date">02 мая 2017 в 11:48</span><a href=""  class="sidebar-news-link">Startsmile представил результаты пятого рейтинга частных стоматологий в РФ</a></li>
								<li class="sidebar-news-last"><span class="sidebar-news-date">01 мая 2017 в 11:48</span><a href=""  class="sidebar-news-link">"ФосАгро" вошла в рейтинг лучших мировых работодателей</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-sm-8">
					<div class="catalog-content wow fadeIn" data-wow-delay="0.3s">
						

						

					

	<h3 class="catalog-title">
	Уведомления о товаре <span>123 товара</span>
</h3>

<div class="table-responsive">
						<table class="catalog-table table vertical-aling gray">
							<thead>
								<tr>
									<th class=""><div>Код</div></th>
									<th class=""><div>Наименование товара</div></th>
									<th class=""><div>Бренд</div></th>
									<th class=""><div>Цена</div></th>
									<th class="last"><div>Кол-во</div></th>
									<th class=""></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>123</td>
									<td>
										<div class="tovar-name">
											<img src="style/img/tovar.png" class="tovar-name-img" alt="">
											<a href="" class="tovar-name-title">Часы детские Smart Baby Watch Q50 (синие)</a>
										</div>
									</td>
									<td>Smart Baby</td>
									<td>123,45 руб</td>
									<td>
										345
									</td>
									<td class="noborder tadle-field-edit">
										<ul class="table-edit">
											<li>
												<a href=""><img src="style/img/icons/delete.png" alt=""></a>
											</li>
											<li>
												<a href=""><img src="style/img/icons/edit.png" alt=""></a>
											</li>
										</ul>
									</td>
								</tr>
								<tr>
									<td>123</td>
									<td>
										<div class="tovar-name">
											<img src="style/img/tovar.png" class="tovar-name-img" alt="">
											<a href="" class="tovar-name-title">Часы детские Smart Baby Watch Q50 (синие)</a>
										</div>
									</td>
									<td>Smart Baby</td>
									<td>123,45 руб</td>
									<td>
										345
									</td>
									<td class="noborder tadle-field-edit">
										<ul class="table-edit">
											<li>
												<a href=""><img src="style/img/icons/delete.png" alt=""></a>
											</li>
											<li>
												<a href=""><img src="style/img/icons/edit.png" alt=""></a>
											</li>
										</ul>
									</td>
								</tr>
								
							</tbody>
						</table>
					</div>

						</div>
				</div>
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
				<?php $url_to_terms = Url::to(['footer/termsofuse'])?>
				<a href="<?= $url_to_terms ?>" class="footer-link wow fadeInUp" data-wow-delay="0.2s">Пользовательское соглашение</a>
			</div>
			<div class="footer-col-cond">
				<?php $url_to_privacy = Url::to(['footer/privacy'])?>
				<a href="<?= $url_to_privacy ?>" class="footer-link wow fadeInUp" data-wow-delay="0.1s">Политика конфиденциальности</a>
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