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

	<section class="section-preview">
	<div class="container">
		<h3 class="section-title wow fadeInUp">B2B-портал Smartbabywatch.ru</h3>

		<p class="section-preview-text wow fadeInUp" data-wow-delay="0.3s">Smartbabywatch.ru — это официальный сайт единственного в России легального дилера. Только в нашем интернет-магазине можно купить «умные» детские часы с GPS и не бояться подделок. Каждая предложенная на сайте единица — это оригинал. Любые Smart Baby Watch не только отличаются стильным внешним видом, но и безупречно работают, что крайне важно, когда речь идёт о детях.
		Многим родителям известно, как маленькие озорники любят новые вещи. Но далеко не все дети отличаются аккуратностью и бережливостью. Чтобы не рисковать благополучием ребёнка, предлагаем купить оригинальные Smart Baby Watch. Подлинные часы гарантированно будут выполнять свои функции и сохранят привлекательный внешний вид даже при интенсивной эксплуатации.
		У нас, как у официального представителя, можно купить русифицированные модели. Они вызывают меньше сложностей не только у основных пользователей (детей), но и у их родителей. Простое и понятное управление позволяет существенно продлить срок эксплуатации, исключая обращения в сервисный центр. При необходимости наши сотрудники удалённо помогут установить регистрационный номер, восстановят логин и пароль и решат множество других вопросов.
		</p>

		<div class="section-preview-buttons wow fadeInUp" data-wow-delay="0.5s">
			<div class="left">
				<a href="<?= $url_to_log ?>" class="btn btn-border btn-round btn-white btn-preview">Вход</a>
			</div>
			<div class="right">
				<div>
					<a href="<?= $url_to_reg ?>" class="btn btn-round btn-preview btn-preview-register">Регистрация</a>
				</div>
			</div>
		</div>
	</div>
</section>



	<section class="section-faq">
	<div class="container">
		<h3 class="section-title title-help wow fadeInUp">Часто задаваемые вопросы</h3>

		<div class="row section-faq-container wow fadeInUp" data-wow-delay="0.3s">
			<div class="col-md-6 section-faq-left">
				<ul class="list-faq">
					<li>
						<span class="trigger">+</span>
						<h4>Как начать пользоваться b2b-порталом?</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
					<li>
						<span class="trigger">+</span>
						<h4>Кто может стать покупателем на сайте?</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
					<li>
						<span class="trigger">+</span>
						<h4>Кто может стать покупателем на сайте?</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
					<li>
						<span class="trigger">+</span>
						<h4>Сроки и стоимость доставки</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
					<li>
						<span class="trigger">+</span>
						<h4>Возврат товара и гарантия</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-md-6 section-faq-right">
				<ul class="list-faq">
					<li>
						<span class="trigger">+</span>
						<h4>Как начать пользоваться b2b-порталом?</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
					<li>
						<span class="trigger">+</span>
						<h4>Кто может стать покупателем на сайте?</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
					<li>
						<span class="trigger">+</span>
						<h4>Кто может стать покупателем на сайте?</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
					<li>
						<span class="trigger">+</span>
						<h4>Сроки и стоимость доставки</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
					<li>
						<span class="trigger">+</span>
						<h4>Возврат товара и гарантия</h4>
						<div class="drop">
							<p class="list-faq-text">Для работы часиков вам необходимо установить приложение к себе на телефон, которое будет указано в инструкции (Setracker, Aibeile, Care Escort) и вставить сим-карту в часы. Далее вы регистрируете гаджет в приложении и можете пользоваться всеми функциями.</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

	<section class="section-ask">
	<div class="container">
		<h3 class="section-title title-normal title-ask wow fadeInUp">Остались вопросы? Напишите нам!</h3>
		<?php $url_to_email = Url::to(['rest/email'])?>
		<a href="<?= $url_to_email ?>" class="btn btn-ask wow fadeInUp" data-wow-delay="0.3s">Задать вопрос</a>
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