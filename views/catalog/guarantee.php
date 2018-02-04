<?php
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
			<a href=""><img src="style/img/icons/out.png" alt="">Вход</a>
			<a href=""><img src="style/img/icons/user.png" alt="">Регистрация</a>
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
				<a href="" class="catalog-user-link wow fadeInUp">Профиль и настройки</a>
				<a href="" class="catalog-user-link wow fadeInUp" data-wow-delay="0.2s">Помощь</a>
				<a href="" class="catalog-user-link wow fadeInUp" data-wow-delay="0.1s">Написать письмо</a>
			</div>
			<div class="catalog-user-right wid wow fadeInUp" data-wow-delay="0.3s">
				<span>Добро пожаловать, <?= $user->name ?> <?= $user->surname ?></span>
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
									<?php if($user->isAdmin()){ ?>
										<li><a href="<?= Url::to(['admin/products']) ?>">Админ панель</a></li>		
									<?php } ?>
									<li><a href="<?= Url::to(['cart/view']) ?>">Корзина</a></li>
									<li><a href="<?= Url::to(['catalog/index']) ?>">Каталог товаров</a></li>
									<li><a href="<?= Url::to(['order/myorders']) ?>">Мои заказы</a></li>
									<li><a href="<?= Url::to(['order/myorders','status'=>'reserved']) ?>">Мои резервы</a></li>
									<li><a href="<?= Url::to(['catalog/return_create']) ?>">Возврат товара</a></li>
									<li><a href="<?= Url::to(['catalog/my_notifications']) ?>">Уведомления о товаре</a></li>
								</ul>
							</div>
						</div>
						
						<div class="sidebar-col-two">
							<div class="sidebar-menu-title">Информация</div>

							<div class="sidebar-menu sidebar-menu-two">
								<ul class="sidebar-menu-list">
									<li><a href="<?= Url::to(['catalog/delivery'])?>">Доставка и оплата</a></li>
									<li><a href="<?= Url::to(['catalog/promotions'])?>">Акции производителей</a></li>
									<li><a href="<?= Url::to(['catalog/guarantee'])?>">Гарантии и сервис</a></li>
									<li><a href="<?= Url::to(['catalog/news'])?>">Новости</a></li>
								</ul>
							</div>
						</div>
						
						<div class="sidebar-col-thee">
							<div class="sidebar-menu-title">Последние новости</div>

							<ul class="sidebar-news">
								<?php // вывод новостей
									foreach($sidebar_news as $news_entry){
									?>
										<li><span class="sidebar-news-date"><?= $news_entry->created_at ?></span><a href="<?= Url::to(['catalog/newsentry', 'id'=>$news_entry->id]) ?>"  class="sidebar-news-link"><?= $news_entry->title ?></a></li>
									<?php	
									}
								?>	
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-sm-8">
					<div class="catalog-content wow fadeIn" data-wow-delay="0.3s">
						

						

					

					<h3 class="catalog-title">
					Гарантия и сервис
				</h3>
				
				<h4 class="text-title">Требуемые документы</h4>
				<div class="text-content">
					Оценка суммы вашего возврата в системе b2b является предварительной. Окончательная сверка суммы возврата осуществляется через бухгалтерию и вашего менеджера.<br>
					При осуществлении возврата необходимо предоставить следующий пакет обязательных документов:<br>
					ТТН (Товарно-Транспортная Накладная) - 2 экземпляра.<br>
					Накл. Торг 12 - 1 экз.<br>
					Счет-фактура - 1 экз.<br>
					Складом будет отмечаться только ТТН 1 экземпляр.<br>
					Без предоставления указанных выше документов Возврат приниматься не будет.<br>
				</div>
				
				
				<h4 class="text-title">Возврат товара надлежащего качества</h4>
				<div class="text-content">
					Для возврата товара надлежащего качества необходимо оформить заявку на возврат в разделе Возврат Товара<br>
					Заявка на возврат оформляется при безналичной форме оплаты товара.<br>
					Возврат товара возможен только на нашем складе расположенном по адресу: Московская область, Подольский р-н, с. Сынково, вл. 80 Схема проезда<br>
					Купленный у нас товар принимается к возврату в течение двух недель с момента покупки, при сохранении товарного вида, оригинальной упаковки и потребительских свойств.<br>
					Не принимаются к возврату шины использованные или бортированные.<br>
					Не принимаются к возврату диски без коробок, без крепежа (болты или гайки, центровочные кольца), если таковые были в комплекте, без декоративной заглушки или колпака, в зависимости от комплектации, бортированные или с испорченным лакокрасочным покрытием.<br>
					Заявка на возврат создается путем добавления кода товара (складской код). Вы можете найти его в товарной накладной в графе "код", в файлах в формате Excel из раздела "файлы с остатками", а также в разделе "подбор шин" ("подбор дисков").<br>
					 Необходимо указать желаемую дату возврата (дату Вашего посещения склада).<br>
					Для ускорения обработки Вашей заявки на возврат, возврат ШИН и ДИСКОВ необходимо оформлять разными заявками.<br>
					После отправки заявки и обработки ее менеджером вы увидите смену статуса заявки, зайдя в заявку увидите цены и одобрение/не одобрение каждой позиции.<br>
					Заявку на возврат нельзя редактировать и отменить. Если у вас возникла необходимость отменить или уменьшить количество товара в заявке свяжитесь с Вашим менеджером.<br>
					По приезду на склад, пожалуйста назовите номер Вашей заявки на возврат.<br>
					Товары не оформленные вышеописанным способом к возврату приниматься не будут.<br>
				</div>
				
				
				<h4 class="text-title">Возврат брака</h4>
				<div class="text-content">
					Оформление заявки на возврат брака аналогично оформлению обычной заявки на возврат товара за исключением следующих моментов: При создании заявки необходимо выбрать в состояние товара "БРАК".<br>
				Необходимо заполнить и распечатать рекламационное заявление по бренду. Копию рекламацмм нужно отправить по электронной почте своему менеджеру.<br>
				Оригинал распечатанного рекламационного заявления нужно отдать на складе при сдаче бракованного товара.<br>
				</div>
				
				<h4 class="text-title">Печатные бланки рекламаций и инструкции по их заполнению</h4>
				<div class="text-content">
					Nokian Tyres<br>
				Bridgestone<br>
				Тoyo<br>
				Dunlop<br>
				Yokohama<br>
				Continental<br>
				Maxxis<br>
				Goodyear<br>
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