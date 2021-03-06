<?php
    use yii\helpers\Url;
?>

<!-- НАЧАЛО ХЕДЕРА -->

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
	
<!-- КОНЕЦ ХЕДЕРА -->

<!-- НАЧАЛО САЙДБАРА -->

	<section class="section-catalog">
	<div class="container">
		<div class="catalog-user-menu">
		<div class="catalog-user-left">
				<a href="<?= Url::to(['catalog/profile_settings']) ?>" class="catalog-user-link wow fadeInUp">Профиль и настройки</a>
				<a href="<?= Url::to(['catalog/helpdesk']) ?>" class="catalog-user-link wow fadeInUp" data-wow-delay="0.2s">Помощь</a>
				<a href="<?= Url::to(['catalog/send_mail']) ?>" class="catalog-user-link wow fadeInUp" data-wow-delay="0.1s">Написать письмо</a>
			</div>
			<div class="catalog-user-right wid wow fadeInUp" data-wow-delay="0.3s">
				<span>Добро пожаловать, <?= $user->name ?> <?= $user->surname ?></span>
				<a href="<?= Url::to(['secure/logout']) ?>">Выйти</a>
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
						

<!-- КОНЕЦ САЙДБАРА -->						

					

	<div class="catalog-title-with">
	<div class="catalog-title-with-left">
		<h3 class="catalog-title">
			Заказ № <?= $order->id ?>
		</h3>
        Способ доставки: <?= $delivery_methods[$order->delivery_method ]?><br>
        Способ оплаты: <?= $payment_methods[$order->payment_method ]?><br>
        Статус: <?= $order_statuses[$order->status] ?>
	</div>
</div>
<br>
<!-- НАЧАЛО ТАБЛИЦЫ -->
<div class="table-responsive">
	<table class="catalog-table table vertical-aling gray">
		<thead>
			<tr>
				<th class=""><div>Предмет</div></th>
				<th class=""><div>Количество</div></th>
				<th class=""><div>Цена за единицу</div></th>
				<th class=""><div>Стоимость</div></th>
			</tr>
		</thead>
		<tbody>
            <?php 
            $total_cost = 0;
            foreach($ordered_items as $ordered_item){ ?>
                <tr>
                    <td><!-- Название -->
                        <?= $item_data[$ordered_item->item_id]['name'] ?>
                    </td>
                    <td><!-- Количество предметов -->
                        
                        <?= $ordered_item->quantity ?>
                        
                    </td>
                    <td><!-- Цена за единицу -->
                        <?= $item_data[$ordered_item->item_id]['price'] ?>
                    </td>
                    <td><!-- Общая стоимость -->
                        <?= $ordered_item->quantity*$item_data[$ordered_item->item_id]['price'] ?>
                    </td>
                   
                </tr>
            <?php 
                $total_cost += $ordered_item->quantity*$item_data[$ordered_item->item_id]['price'];
            } // Конец цикла ?>
		</tbody>
	</table>

</div>
<!-- КОНЕЦ ТАБЛИЦЫ -->
Общая стоимость: <b><?= $total_cost ?></b> рублей
<br>
<?php // Для зарезервированных заказов - кнопка подтвердить
if($order->status == 2){
    ?>
        <a href="<?= Url::to(['catalog/reserve_to_confirmed', 'id' => $order->id]) ?>">
            <div class="btn btn-default">Подтвердить</div>
        </a>
    <?php
} // Конец блока показа кнопки "подтвердить зарезервированный заказ"
?>

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
				<p>Copyright © ООО "Смарт Бэби Вотч" 2018. Все права защищены</p>
			</div>
			<div class="footer-col-politic">
				<a href="<?= Url::to(['catalog/user_agreement']) ?>" class="footer-link wow fadeInUp" data-wow-delay="0.2s">Пользовательское соглашение</a>
			</div>
			<div class="footer-col-cond">
				<a href="<?= Url::to(['catalog/privacy_policy'])?>" class="footer-link wow fadeInUp" data-wow-delay="0.1s">Политика конфиденциальности</a>
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