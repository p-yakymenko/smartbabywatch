<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;
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
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				
				<div class="text-center">
					<h3 class="catalog-title">
						Авторизация
					</h3>
					<p class="catalog-title-sub">Зарегистрированные клиенты могут оформлять заказы, просматривать статус и историю заказов.</p>
				</div>
				

				<?php
				// Форма входа
				$form = ActiveForm::begin();
				?>
					
					<?= $form->field($model, 'email')->label('E-mail (login)') ?>
					<?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

					<?= Html::submitButton('Войти', ['class' => 'btn btn-blue pull-right']) ?>

				<?php 
				ActiveForm::end();
				?>
				<br>
				<form action="/" method="post">
					<div class="form-group">
						<label class="form-label">Логин/E-mail</label>
						<input type="text" class="form-control form-input">
					</div>

					<div class="form-group">
						<label class="form-label">Пароль</label>
						<input type="text" class="form-control form-input">
					</div>
					
					
					<div class="form-reg-bottom">
						<div class="form-reg-bottom-left">
							<div class="checkbox checkbox-margin">
			                    <input id="checkbox2" type="checkbox">
			                    <label for="checkbox2">
			                        Запомнить меня
			                    </label>
			                </div>
		                </div>
		                <div class="form-reg-bottom-right">
		                	<a href="" class="">Забыли пароль?</a>
		                </div>
	                </div>

	                <button type="submit" class="btn btn-blue pull-right">Войти</button>
				</form>

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