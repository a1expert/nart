    </main>
        <footer role="contentinfo" class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-3"><a href="/" class="logo"><img src="<?=$commonInfo["headerLogo"];?>" alt="Нарт"
							 width="140" height="60" class="logo__picture" title="" /></a></div>
					<div class="col-xs-12 col-sm-5 col-md-6">
						<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", Array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "",
							"DELAY" => "N",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_GET_VARS" => array(""),
							"MENU_CACHE_TIME" => "360000",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "bottom",
							"USE_EXT" => "Y"
						), false, array("HIDE_ICONS"=>"Y"));?>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<address class="footer__address">
							<p class="footer__phone"><?=$commonInfo["footerPhone"];?></p>
							<p class="footer__street"><?=$commonInfo["footerAddress"];?></p>
							<p class="footer__mail"><?=$commonInfo["footerEmail"];?></p>
						</address>
					</div>
				</div>
				<div class="row footer__row">
					<div class="col-xs-12 col-sm-3 col-md-3">
						<a href="/" target="_blank" rel="nofollow noopener" class="footer__link">&copy; 2018 autonart.ru</a>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-6">
						<a href="<?=$commonInfo["privatePolicy"];?>" target="_blank" rel="nofollow noopener" class="footer__link">Политика конфиденциальности</a>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 footer__dev">
						<a href="//a1-reklama.ru" target="_blank" rel="nofollow noopener" class="footer__link">Разработка: A1 интернет-эксперт</a>
					</div>
				</div>
			</div>
		</footer><!--	+scripts(['app.min.js'])-->
		<template id="mainForm">
			<?$APPLICATION->IncludeComponent("a1expert:mainForm", "", Array(
				"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
				"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
				"CUSTOM_TITLE_DETAIL_PICTURE" => "",
				"CUSTOM_TITLE_DETAIL_TEXT" => "",
				"CUSTOM_TITLE_IBLOCK_SECTION" => "",
				"CUSTOM_TITLE_NAME" => "",
				"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
				"CUSTOM_TITLE_PREVIEW_TEXT" => "",
				"CUSTOM_TITLE_TAGS" => "",
				"DEFAULT_INPUT_SIZE" => "30",
				"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
				"ELEMENT_ASSOC" => "CREATED_BY",
				"GROUPS" => array("2"),
				"IBLOCK_ID" => "16",
				"IBLOCK_TYPE" => "form",
				"LEVEL_LAST" => "Y",
				"LIST_URL" => "",
				"MAX_FILE_SIZE" => "0",
				"MAX_LEVELS" => "100000",
				"MAX_USER_ENTRIES" => "100000",
				"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
				"PROPERTY_CODES" => array(0=>"NAME", 1=>"65", 2=>"66", 3=>"67"),
				"PROPERTY_CODES_REQUIRED" => array(0=>"NAME", 1=>"66"),
				"RESIZE_IMAGES" => "N",
				"SEF_MODE" => "N",
				"STATUS" => "ANY",
				"STATUS_NEW" => "N",
				"USER_MESSAGE_ADD" => "",
				"USER_MESSAGE_EDIT" => "",
				"USE_CAPTCHA" => "N"
				));?>
		</template>
		<template id="formPopup">
			<div class="formPopup">
				<div class="formPopup__layout">
					<div class="formPopup__inner">
						<button aria="close" class="formPopup__close"><span>+</span></button>
						<div method="post" enctype="multipart/form-data" class="formPopup__content">
						<?$APPLICATION->IncludeComponent("bitrix:iblock.element.add.form", "callback", Array(
							"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
							"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
							"CUSTOM_TITLE_DETAIL_PICTURE" => "",
							"CUSTOM_TITLE_DETAIL_TEXT" => "",
							"CUSTOM_TITLE_IBLOCK_SECTION" => "",
							"CUSTOM_TITLE_NAME" => "",
							"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
							"CUSTOM_TITLE_PREVIEW_TEXT" => "",
							"CUSTOM_TITLE_TAGS" => "",
							"DEFAULT_INPUT_SIZE" => "30",
							"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
							"ELEMENT_ASSOC" => "CREATED_BY",
							"GROUPS" => array("2"),
							"IBLOCK_ID" => "15",
							"IBLOCK_TYPE" => "form",
							"LEVEL_LAST" => "Y",
							"LIST_URL" => "",
							"MAX_FILE_SIZE" => "0",
							"MAX_LEVELS" => "100000",
							"MAX_USER_ENTRIES" => "100000",
							"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
							"PROPERTY_CODES" => array(0=>"NAME", 1=>"64"),
							"PROPERTY_CODES_REQUIRED" => array(0=>"NAME", 1=>"64"),
							"RESIZE_IMAGES" => "N",
							"SEF_MODE" => "N",
							"STATUS" => "ANY",
							"STATUS_NEW" => "N",
							"USER_MESSAGE_ADD" => "",
							"USER_MESSAGE_EDIT" => "",
							"USE_CAPTCHA" => "N"
							));?>
						</div>
					</div>
				</div>
			</div>
		</template>
		<template id="successMessage">
			<div class="successMessage">
				<p class="successMessage__heading"><strong>Заявка принята</strong></p>
				<div class="successMessage__icon"></div>
				<p class="successMessage__message">Менеджер перезвонит вам в ближайшее время, уточнит детали заказа, сообщит о цене
					требуемых позиций или услуг</p>
			</div>
        </template>
    </body>
</html>