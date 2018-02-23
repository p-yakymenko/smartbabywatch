<?php
	use yii\helpers\Html;
    use yii\widgets\ActiveForm;
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
		

	</div>
</header>

	<section class="section-wrap">
	<div class="container">
		<div class="catalog-user-menu">
		<div class="catalog-user-left">
        <a href="<?= Url::to(['catalog/index']) ?>" class="catalog-user-link wow fadeInUp">Каталог</a>
		<a href="<?= Url::to(['catalog/helpdesk']) ?>" class="catalog-user-link wow fadeInUp" data-wow-delay="0.2s">Помощь</a>
		<a href="<?= Url::to(['catalog/send_mail']) ?>" class="catalog-user-link wow fadeInUp" data-wow-delay="0.1s">Написать письмо</a>
	</div>
	<div class="catalog-user-right wid wow fadeInUp" data-wow-delay="0.3s">
		<span>Добро пожаловать, Иван Петров</span>
		<a href="<?= Url::to(['secure/logout']) ?>">Выйти</a>
	</div>
</div>

		<div class="profile-top profile-top-man">
			<div class="profile-top-ico">
				<img src="style/img/icons/home.png" alt="">
			</div>
			<div class="profile-top-sep">/</div>
			<h3 class="profile-top-title">
				Настройки
			</h3>
		</div>
		

		
	     
		
			<div class="row">
				<div class="col-md-5">
					<h5 class="form-title">Выберите способ доставки</h5>
					<!-- МЕНЮ ВЫБОРА МЕТОДА ДОСТАВКИ -->
					
                    <ul class="nav nav-pills nav-pills-merge nav-pills-block margin nav-order">
                        <li class="active">
							<a href="<?= Url::to(['cart/delivery_pickup', 'status'=>$status ])?>">Самовывоз</a>
						</li>
						<li class="">
                            <a href="<?= Url::to(['cart/delivery_address', 'status'=>$status ])?>">Адресная доставка</a>
						</li>
						<li class="">
                            <a href="<?= Url::to(['cart/delivery_courier', 'status'=>$status ])?>">Другой город</a>
						</li> 

					</ul>


                    <!-- КОНЕЦ МЕНЮ ВЫБОРА МЕТОДА ДОСТАВКИ -->
					
					<div class="tab-content clearfix">
						
						<!-- САМОВЫВОЗ -->
                        <div class="tab-pane active">

							<div class="order-loaction">
								<div class="order-loaction-text">
									Самовывоз осуществляется по адресу: 125315, г.Москва, Ленинградский проспект 80, корп 16, оф. 123
								</div>

							</div>

                            <?php $form = ActiveForm::begin() ?>

                                    <?= $form->field($model, 'delivery_fio')->label('ФИО получателя<span class="form-label-important">*</span>') ?>
                                    <?= $form->field($model, 'delivery_phone')->label('Номер телефона<span class="form-label-important">*</span>') ?>
                                    <?= $form->field($model, 'delivery_comment')->label('Комментарий')->textarea() ?>
                                    <?= $form->field($model, 'payment_method')->dropDownlist(
                                        [
                                            '1' => 'Наличные',
                                            '2' => 'Visa/Mastercard',
                                            '3' => 'Webmoney',
                                            '4' => 'Яндекс.Деньги'
                                        ]
                                    )->label('Способ оплаты'); ?>

                                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

                                <?php ActiveForm::end() ?>

						</div>
                        <!-- КОНЕЦ САМОВЫВОЗА -->
						
					</div>

				</div>

				<div class="col-md-5 col-md-offset-1">
					
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