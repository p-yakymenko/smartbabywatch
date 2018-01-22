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
								<ul class="sidebar-menu-list">
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
	Каталог товаров <span>123 товара</span>
</h3>

<div class="form">
	<form action="/" method="post">
		<div class="form-row">
			<div class="form-field form-field-category form-select-style">
				<select name="cat" class="form-select selectpicker">
					<option value="">Выберите категорию</option>
					<option value="">1</option>
					<option value="">2</option>
					<option value="">3</option>
				</select>
			</div>
			<div class="form-field form-field-subcategory form-select-style">
				<select name="cat" class="form-select selectpicker">
					<option value="">Выберите подкатегорию</option>
					<option value="">1</option>
					<option value="">2</option>
					<option value="">3</option>
				</select>
			</div>
			<div class="form-field form-field-search">
				<div class="form-input form-input-search">
					<input type="text" name="search" placeholder="Код или название товара">

					<button type="submit" class="form-input-search-button">
						<img src="style/img/icons/search.png" alt="">
					</button>
				</div>
			</div>
		</div>
		
	</form>

	<div class="form-params">
		<div class="form-params-more">
			<a href="">+ Больше параметров</a>
		</div>
		<div class="form-params-reset">
			<a href=""><img src="style/img/icons/x.png" alt=""> Сбросить фильтр</a>
		</div>
		<div class="form-params-load">
			<a href=""><img src="style/img/icons/file.png" alt=""> Загрузить заказ из файла</a>
		</div>
	</div>
</div>

<div class="catalog-filter">
	<div class="catalog-filter-field1">
		<div class="checkbox checkbox-primary">
            <input id="checkbox1" type="checkbox">
            <label for="checkbox1">
                Только товары с фото
            </label>
        </div>
	</div>
	<div class="catalog-filter-field2">
		<div class="checkbox checkbox-primary">
            <input id="checkbox2" type="checkbox" checked>
            <label for="checkbox2">
                Только товары в наличии
            </label>
        </div>
	</div>
	<div class="catalog-filter-field3">
		<span>Вид отображения:</span>

		<ul class="nav catalog-type">
			<li class="active">
				<a href="#1b" data-toggle="tab">
					<img src="style/img/icons/table.png" alt=""> <span>таблица</span>
				</a>
			</li>
			<li class="">
				<a href="#2b" data-toggle="tab">
					<img src="style/img/icons/row.png" alt=""> <span>список</span>
				</a>
			</li>
		</ul>

	</div>
</div>

<div class="tab-content clearfix">
	<div class="tab-pane active" id="1b">

			<div class="table-responsive">
				<table class="catalog-table table ">
					<thead>
						<tr>
							<th class="catalog-wid-code"><div>Код</div></th>
							<th class="catalog-wid-name"><div>Наименование товара</div></th>
							<th class="catalog-wid-brend"><div>Бренд</div></th>
							<th class="catalog-wid-price"><div>Цена</div></th>
							<th class="catalog-wid-sclad"><div>На складе</div></th>
							<th class="catalog-wid-buy"><div>Купить</div></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><div class="tovar-number">123</div></td>
							<td>
								<div class="tovar-name">
									<img src="style/img/tovar.png" class="tovar-name-img" alt="">
									<a href="" class="tovar-name-title">Часы детские Smart Baby Watch Q50 (синие)</a>
								</div>
							</td>
							<td>Smart Baby</td>
							<td>123,45 руб</td>
							<td>
								<span class="tovar-status tovar-status-none">не доступно</span>
							</td>
							<td>
								<div class="tovar-order">
									<a href="">Заказать</a>
									<span>Уведомить о наличии</span>
								</div>
							</td>
						</tr>
						<tr>
							<td><div class="tovar-number">123</div></td>
							<td>
								<div class="tovar-name">
									<img src="style/img/tovar.png" class="tovar-name-img" alt="">
									<a href="" class="tovar-name-title">Часы детские Smart Baby Watch Q50 (синие)</a>
								</div>
							</td>
							<td>Smart Baby</td>
							<td>123,45 руб</td>
							<td>
								<span class="tovar-status tovar-status-yes">доступно</span>
							</td>
							<td>
								<div class="tovar-buy">
									<div class="tovar-buy-input">
										<span>-</span>
										<input type="text" value="1">
										<span>+</span>
									</div>
									<a href=""><img src="style/img/icons/basket.png" alt=""></a>
								</div>
							</td>
						</tr>
						<tr>
							<td><div class="tovar-number">123</div></td>
							<td>
								<div class="tovar-name">
									<img src="style/img/tovar.png" class="tovar-name-img" alt="">
									<a href="" class="tovar-name-title">Часы детские Smart Baby Watch Q50 (синие)</a>
								</div>
							</td>
							<td>Smart Baby</td>
							<td>123,45 руб</td>
							<td>
								<span class="tovar-status tovar-status-yes">доступно</span>
							</td>
							<td>
								<div class="tovar-buy">
									<div class="tovar-buy-input">
										<span>-</span>
										<input type="text" value="1">
										<span>+</span>
									</div>
									<a href=""><img src="style/img/icons/basket.png" alt=""></a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
	</div>

	<div class="tab-pane" id="2b">
		<div class="catalog-list">
			<div class="catalog-list-item catalog-list-item-disable">
				<div class="catalog-list-field-img">
					<a href=""><img src="style/img/news.png" alt=""></a>
				</div>
				<div class="catalog-list-field-text">
					<h3 class="catalog-list-title"><a href="">Часы детские Smart Baby Watch Q50 (синие)</a></h3>
					<ul class="catalog-list-details">
						<li class="catalog-list-details-item">Код товара: <span>123</span></li>
						<li class="catalog-list-details-item">Код товара: <span>123</span></li>
						<li><span class="tovar-status tovar-status-none">не доступно</span></li>
					</ul>
				</div>
				<div class="catalog-list-field-buttons">
					<div class="catalog-list-price">123,45 руб</div>
					<div class="catalog-list-tocat">
						<a href="" class="catalog-list-notify">Уведомить о наличии</a>

						<button type="submit" class="btn btn-blue btn-cat">В корзину</button>
					</div>
				</div>
			</div>
			<div class="catalog-list-item">
				<div class="catalog-list-field-img">
					<a href=""><img src="style/img/news.png" alt=""></a>
				</div>
				<div class="catalog-list-field-text">
					<h3 class="catalog-list-title"><a href="">Часы детские Smart Baby Watch Q50 (синие)</a></h3>
					<ul class="catalog-list-details">
						<li class="catalog-list-details-item">Код товара: <span>123</span></li>
						<li class="catalog-list-details-item">Код товара: <span>123</span></li>
						<li><span class="tovar-status tovar-status-none">не доступно</span></li>
					</ul>
				</div>
				<div class="catalog-list-field-buttons">
					<div class="catalog-list-price">123,45 руб</div>
					<div class="catalog-list-tocat">
						<div class="tovar-buy-input tovar-buy-input-31">
							<span>-</span>
							<input type="text" value="1">
							<span>+</span>
						</div>

						<button type="submit" class="btn btn-blue btn-cat">В корзину</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<nav class="catalog-nav">
	<a href="" class="catalog-nav-item catalog-nav-back"><span class="catalog-nav-arr-back">&lt;</span> Предыдущая</a>
	<div class="catalog-nav-center">
		<a href="" class="catalog-nav-link">1</a>
		<a href="" class="catalog-nav-link">2</a>
		<a href="" class="catalog-nav-link">3</a>
		<a href="" class="catalog-nav-link">4</a>
		<span class="catalog-nav-sep">...</span>
		<a href="" class="catalog-nav-link">5</a>
	</div>
	<a href="" class="catalog-nav-item catalog-nav-next">Следующая <span class="catalog-nav-arr-next">&gt;</span></a>
</nav>
					

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