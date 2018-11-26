    </main>
        <footer role="contentinfo" class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-3"><a href="#" class="logo"><img src="./assets/images/logo.png" alt="Нарт"
							 width="140" height="60" class="logo__picture" title="" /></a></div>
					<div class="col-xs-12 col-sm-5 col-md-6">
						<nav class="footer__menu">
							<ul class="footer__list">
								<li class="footer__item"><a href="#" class="link link_menu link_brand">Услуги перевозки</a></li>
								<li class="footer__item"><a href="#" class="link link_menu link_brand">Аренда транспорта</a></li>
								<li class="footer__item"><a href="#" class="link link_menu link_brand">О компании</a></li>
								<li class="footer__item"><a href="#" class="link link_menu link_brand">Вопрос-ответ</a></li>
								<li class="footer__item"><a href="#" class="link link_menu link_brand">Вакансии</a></li>
								<li class="footer__item"><a href="#" class="link link_menu link_brand">Контакты</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3"><address class="footer__address">
							<p class="footer__phone">+7 (3462) 52-42-42</p>
							<p class="footer__street">г. Сургут, ул. Энгельса д. 11</p>
							<p class="footer__mail">nart_89@mail.ru</p>
						</address></div>
				</div>
				<div class="row footer__row">
					<div class="col-xs-12 col-sm-3 col-md-3"><a href="#" target="_blank" rel="nofollow noopener" class="footer__link">&copy;
							2018 autonart.ru</a></div>
					<div class="col-xs-12 col-sm-5 col-md-6"><a href="#" target="_blank" rel="nofollow noopener" class="footer__link">Политика
							конфиденциальности</a></div>
					<div class="col-xs-12 col-sm-4 col-md-3 footer__dev"><a href="#" target="_blank" rel="nofollow noopener" class="footer__link">Разработка:
							A1 интернет-эксперт</a></div>
				</div>
			</div>
		</footer><!--	+scripts(['app.min.js'])--><template id="formPopup">
			<div class="formPopup">
				<div class="formPopup__layout">
					<div class="formPopup__inner"><button aria="close" class="formPopup__close"><span>+</span></button>
						<div method="post" enctype="multipart/form-data" class="formPopup__content">
							<form class="formPopup__form">
								<p class="formPopup__heading"><strong>Заполните форму</strong> и получите бесплатную консультацию</p>
								<fieldset class="formPopup__block"><input type="tel" id="popupTel" required="required" pattern="^[ 0-9]+$"
									 class="input jsFloating" /><label for="popupTel" class="floatingLabel">Ваш телефон</label></fieldset>
								<fieldset class="formPopup__block"><button class="button formPopup__submit">Отправить</button></fieldset><small
								 class="formPopup__privacy">Заполняя настоящую форму вы даете свое согласие на обработку своих <a href="#"
									 target="_blank" rel="noopener nofollow">персональных данных</a></small>
							</form>
						</div>
					</div>
				</div>
			</div>
		</template><template id="successMessage">
			<div class="successMessage">
				<p class="successMessage__heading"><strong>Заявка принята</strong></p>
				<div class="successMessage__icon"></div>
				<p class="successMessage__message">Менеджер перезвонит вам в ближайшее время, уточнит детали заказа, сообщит о цене
					требуемых позиций или услуг</p>
			</div>
        </template>
    </body>
</html>