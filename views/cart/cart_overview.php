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

	<section class="section-wrap">
	<div class="container">
		<div class="catalog-user-menu">
	<div class="catalog-user-left">
        <a href="<?= Url::to(['catalog/index']) ?>" class="catalog-user-link wow fadeInUp">Каталог</a>
		<a href="" class="catalog-user-link wow fadeInUp">Профиль и настройки</a>
		<a href="" class="catalog-user-link wow fadeInUp" data-wow-delay="0.2s">Помощь</a>
		<a href="" class="catalog-user-link wow fadeInUp" data-wow-delay="0.1s">Написать письмо</a>
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
				Оформить заказ №2 - список товаров
			</h3>
		</div>
		

 
		
		
			<div class="table-responsive">
				<table class="catalog-table table vertical-aling gray">
					<thead>
						<tr>
							<th class=""><div>№</div></th>
							<th class=""><div>Код</div></th>
							<th class=""><div>Наименование товара</div></th>
							<th class=""><div>Цена</div></th>
							<th class=""><div>Количество</div></th>
							<th class="last"><div>Общая сумма</div></th>
							<th class=""></th>
						</tr>
					</thead>
					<tbody>
						<?php
                        // Выводим товары из корзины
                        $row_number = 1;
                        $total_cost = 0;
                        $total_quantity = 0;
                        foreach($cart_content as $cart_entry){
                            $total_entry_cost = $item_array[$cart_entry->item_id]['price'] * $cart_entry->quantity;
                        ?>
                            <tr>
                                <td><?= $row_number ?></td>
                                <td>
                                    <?= $item_array[$cart_entry->item_id]['code']; ?>
                                </td>
                                <td>
                                    <div class="tovar-name tovar-name-auto">
                                        <img src="style/img/tovar.png" class="tovar-name-img" alt="">
                                        <a href="" class="tovar-name-title"><?= $item_array[$cart_entry->item_id]['name']; ?></a>
                                    </div>
                                </td>
                                <td><?= $item_array[$cart_entry->item_id]['price']; ?> р</td>
                                <td>
                                    
                                        <?= $cart_entry->quantity ?>
                                    
                                </td>
                                <td><span class="font-bold"><?= $total_entry_cost ?> руб</span></td>
                                <td class="noborder tadle-field-edit tadle-field-edit-one">
                                    <ul class="table-edit">
                                        <li>
                                            <a href="<?= Url::to(['cart/removeentry', 'id' => $cart_entry->id])?>"><img src="style/img/icons/x-big.png" alt=""></a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
						<?php 
                            $total_quantity += $cart_entry->quantity;
                            $total_cost += $total_entry_cost;
                            $row_number += 1;
                        } // заканчиваем вывод товара
                        ?>
					</tbody>
				</table>
			</div>
			
			<div class="table-rezerv-buttons-padding table-rezerv-buttons-padding-one clearfix">
				<div class="rezerv-total">
					Итого: <span><?= $total_quantity ?></span> товара на <span><?= $total_cost ?> руб</span>
				</div> 
	            
	            
				<a href="<?= Url::to(['cart/createorder']) ?>">
				<button type="submit" class="btn btn-blue pull-right">Оформить заказ</button></a>

				<!-- ОТЛОЖИТЬ В РЕЗЕРВ -->
				<a href="<?= Url::to(['cart/createorder', 'status' => 'reserve']) ?>">
					<button type="submit" class="btn btn-white btn-white-hover pull-right">Отложить в резерв</button>     
				</a>
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