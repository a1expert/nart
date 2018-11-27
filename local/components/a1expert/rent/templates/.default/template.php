<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
use Bitrix\Main\Loader;
include_once(Loader::getDocumentRoot() . $componentPath . "/classes.php");
$fixer = new Rent();
// ShowRes($arResult);
?>
<div class="back">
	<div class="container">
		<a href="#" class="back__link">< Назад к списку товаров</a>
	</div>
</div>
<section class="carInfo">
	<div class="carInfo__top">
		<div class="container">
			<h1 class="heading carInfo__heading carInfo__heading carInfo__heading_mobile">Название транспорта</h1>
			<div class="row">
				<div class="col-xs-12 col-md-7">
					<div class="carGallery">
						<ul class="carGallery__previewsList">
							<li class="carGallery__preview">
								<button type="button" data-type="img" data-src="assets/images/fullsize.png" class="carGallery__button carGallery__button_active">
									<img src="assets/images/preview.png" alt="preview" title="preview" />
								</button>
							</li>
							<li class="carGallery__preview">
								<button type="button" data-type="img" data-src="assets/images/fullsize.png" class="carGallery__button">
									<img src="assets/images/preview.png" alt="preview" title="preview" />
								</button>
							</li>
							<li class="carGallery__preview">
								<button type="button" data-type="video" data-src="assets/video/.png" class="carGallery__button carGallery__button_video">
									<img src="assets/images/preview.png" alt="preview" title="preview" />
								</button>
							</li>
						</ul>
						<div class="carGallery__fullsize"><img src="assets/images/fullsize.png" alt="#" /></div>
					</div>
				</div>
				<div class="col-xs-12 col-md-5">
					<div class="carChars">
						<h1 class="heading carInfo__heading carInfo__heading carInfo__heading_desktop">Название транспорта</h1>
						<table class="carChars__characteristics">
							<tr>
								<td>Тип транспорта:</td>
								<td>Автобус</td>
							</tr>
							<tr>
								<td>Кол-во мест:</td>
								<td>43</td>
							</tr>
							<tr>
								<td>Комфортабельность:</td>
								<td>Комфорт</td>
							</tr>
							<tr>
								<td>Год выпуска:</td>
								<td>2011 г.</td>
							</tr>
							<tr>
								<td>Минимальный заказ:</td>
								<td>от 2 часов</td>
							</tr>
							<tr>
								<td>Оснащение</td>
								<td><a href="#">смотреть комплектацию</a></td>
							</tr>
						</table>
						<p class="carChars__price"><strong>4 000 руб/час</strong></p>
						<button class="button jsPopup">Оставить завявку</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="carInfo__bottom">
		<div class="container">
			<section class="carDescription">
				<h2 class="heading">Описание</h2>
				<div class="carDescription__text">
					<p>Автобус средней вместимости, который имеет множество модификаций и рассчитан на перевозку до 33 пассажиров. В нашем автопарке вы  выбрать этот автобус любой вместимости. Кроме того, автобус отличает достаточная степень надежности. Современное оснащение салона и продуманная система управления создают чувство комфорта и безопасности.</p>
				</div>
			</section>
			<section class="carComplect">
				<h2 class="heading">Комплектация</h2>
				<div class="carComplect__text">
					<p>В автобусе есть все, что необходимо для вашего комфорта. При поездке на любые расстояния у вас не возникнет чувства усталости. Автобус  комфортный микроклимат в салоне: благодаря продуманной системе встроенных сопел каждый пассажир может самостоятельно настроить температуру на своем месте.</p>
					<p>Внутри можно даже лежать. Большие отделения предусмотрены для размещения сумок,
					спортивного инвентаря и чемоданов. Этот автобус подойдет для самых протяженных поездок.</p>
				</div>
				<ul class="carComplect__icons row">
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon1.png" alt="#" /></div>
						<p class="carComplect__iconText">Наличие ремней безопасности</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon2.png" alt="#" /></div>
						<p class="carComplect__iconText">Высота 2 метра</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon3.png" alt="#" /></div>
						<p class="carComplect__iconText">Длина 6.25 метра</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon4.png" alt="#" /></div>
						<p class="carComplect__iconText">26 мест</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon5.png" alt="#" /></div>
						<p class="carComplect__iconText">Наклонная спинка</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon6.png" alt="#" /></div>
						<p class="carComplect__iconText">Микрофон</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon7.png" alt="#" /></div>
						<p class="carComplect__iconText">Кондиционер</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon8.png" alt="#" /></div>
						<p class="carComplect__iconText">Багажные полки</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon9.png" alt="#" /></div>
						<p class="carComplect__iconText">Подлокотники</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon10.png" alt="#" /></div>
						<p class="carComplect__iconText">Индивидуальное освещение</p>
					</li>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="assets/images/char_icon11.png" alt="#" /></div>
						<p class="carComplect__iconText">Телевизор</p>
					</li>
				</ul>
			</section>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<div class="licenses">
						<h2 class="heading">Лицензии на деятельность</h2>
						<ul class="row">
							<li class="col-xs-12 col-sm-6 col-md-6">
								<div class="licenses__item">
									<a href="#" class="licenses__link">
										<img src="assets/images/license.png" alt="#" class="licenses__preview" title="" />
									</a>
								</div>
							</li>
							<li class="col-xs-12 col-sm-6 col-md-6">
								<div class="licenses__item">
									<a href="#" class="licenses__link">
										<img src="assets/images/license.png" alt="#" class="licenses__preview" title="" />
									</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-md-5 col-md-offset-1">
					<h2 class="heading">Документы</h2>
					<ul class="linkBlock linkBlock_column">
						<li class="linkBlock__item">
							<a href="#" class="link link_icon"><span>Реквизиты ООО "Автонарт"</span></a>
						</li>
						<li class="linkBlock__item">
							<a href="#" class="link link_icon"><span>Реквизиты ООО "Автонарт"</span></a>
						</li>
						<li class="linkBlock__item">
							<a href="#" class="link link_icon"><span>Реквизиты ООО "Автонарт"</span></a>
						</li>
						<li class="linkBlock__item">
							<a href="#" class="link link_icon"><span>Реквизиты ООО "Автонарт"</span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="similars">
	<div class="container">
		<h2 class="heading">Похожие автобусы</h2>
		<ul class="similars__list row">
			<li class="similars__item col-xs-12 col-sm-6 col-md-4">
				<article class="rentItem">
					<a href="#" class="rentItem__link">
						<div class="rentItem__header">
							<img src="assets/images/rentItem1.png" alt="услугаблабла" class="rentItem__picture" title="" />
						</div>
						<div class="rentItem__content">
							<h2 class="rentItem__name"></h2>
							<table class="rentItem__characteristics">
								<tr>
									<td>Тип:</td>
									<td>Автобус</td>
								</tr>
								<tr>
									<td>Мест:</td>
									<td class="rentItem__seats"></td>
								</tr>
								<tr>
									<td>Класс:</td>
									<td class="rentItem__type"></td>
								</tr>
							</table>
							<p class="rentItem__price"><strong>от &nbsp;<span></span>&nbsp; руб/час</strong></p>
						</div>
					</a>
				</article>
			</li>
		</ul>
	</div>
</section>


<?/*
<div style="background-image:url(<?=(!empty($arResult["DETAIL_PICTURE"]["SRC"])) ? $arResult["DETAIL_PICTURE"]["SRC"] : "/local/assets/images/hero1.png";?>)" class="hero hero_picture">
	<div class="container">
		<div class="hero__content">
			<h1 class="pageHeading"><?=$arResult["NAME"];?></h1>
			<div class="hero__intro"><?=$arResult["DISPLAY_PROPERTIES"]["DESCRIPTION"]["~VALUE"];?></div>
		<?if(!empty($arResult["DISPLAY_PROPERTIES"]["ADV_LIST_BLOCK1"]["RESULT"]))
		{?>
			<ul class="hero__list">
				<?foreach ($arResult["DISPLAY_PROPERTIES"]["ADV_LIST_BLOCK1"]["RESULT"] as $k => $v)
				{?>
					<li class="hero__item">
						<div class="hero__icon"><img src="<?=$v["PROPERTY_IMAGES_VALUE"]["SRC"]?>" alt="#" title="#" /></div>
						<div><?=$v["~PROPERTY_TEXT_VALUE"]["TEXT"]?></div>
					</li><?
				}?>
			</ul><?
		}?>
			<div class="hero__footer"><button class="button jsPopup">Оставить заявку</button>
				<p class="hero__or">или звоните по телефону: <br><strong>+7 (3462) 269-57-58</strong></p>
			</div>
		</div>
	</div>
</div>
<section class="principles">
	<div class="container">
		<h2 class="heading"><?=$arResult["DISPLAY_PROPERTIES"]["HEADER_BLOCK2"]["VALUE"];?></h2>
		<p class="principles__intro"><?=$arResult["DISPLAY_PROPERTIES"]["TEXT_BLOCK2"]["VALUE"];?></p>
	<?if(!empty($arResult["DISPLAY_PROPERTIES"]["ADV_LIST_BLOCK2"]["RESULT"]))
	{?>
		<ol class="principles__list">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["ADV_LIST_BLOCK2"]["RESULT"] as $k => $v)
		{?>
			<li class="principles__item">
				<h3 class="principles__title"><?=$v["NAME"];?></h3>
				<div class="principles__text"><?=$v["DETAIL_TEXT"];?></div>
			</li><?
		}?>
		</ol><?
	}?>
		<p class="principles__outro"><strong><?=$arResult["DISPLAY_PROPERTIES"]["CALL_TO_ACTION"]["VALUE"]?></strong></p>
	<?if(!empty($arResult["DISPLAY_PROPERTIES"]["DOCS"]["RESULT"]))
	{?>
		<ul class="linkBlock">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["DOCS"]["RESULT"] as $k => $v)
		{
			$fsize = $fixer->GetFSize($v["PROPERTY_DOC_VALUE"]["FILE_SIZE"]);?>
			<li class="linkBlock__item"><a href="<?=$v["PROPERTY_DOC_VALUE"]["SRC"];?>" class="link link_icon" target="_blank" title="<?=$v["PROPERTY_DOC_VALUE"]["ORIGINAL_NAME"] . "&nbsp;" . $fsize?>"><span><?=$v["NAME"];?></span></a></li><?
		}?>
		</ul><?
	}?>
	</div>
</section>
<?if(!empty($arResult["DISPLAY_PROPERTIES"]["COMPANY_ADV"]["RESULT"])){?>
<section class="advantages">
	<div class="container">
		<h2 class="heading visuallyHidden">Преимущества сотрудничества с нами</h2>
		<ul class="advantages__list">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["COMPANY_ADV"]["RESULT"] as $k => $v)
		{?>
			<li class="advantages__item">
				<div class="advantages__icon"><img src="<?=$v["PREVIEW_PICTURE"]["SRC"];?>" alt="<?=$v["NAME"];?>" class="advantages__picture" title="<?=$v["NAME"];?>" /></div>
				<div class="advantages__content">
					<p class="advantages__title"><strong><?=$v["NAME"];?></strong></p>
					<p class="advantages__text"><?=$v["PREVIEW_TEXT"];?></p>
				</div>
			</li><?
		}?>
		</ul>
	</div>
</section><?
}
if(!empty($arResult["DISPLAY_PROPERTIES"]["VEHICLE"]["RESULT"])){?>
<section class="similars">
	<div class="container">
		<h2 class="heading"><?=$arResult["DISPLAY_PROPERTIES"]["HEADERS_BLOCK4"]["VALUE"];?></h2>
		<ul class="similars__list row">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["VEHICLE"]["RESULT"] as $k => $v)
		{?>
			<li class="similars__item col-xs-12 col-sm-6 col-md-4">
				<article class="rentItem">
					<a href="<?=$v["DETAIL_PAGE_URL"];?>" class="rentItem__link">
						<div class="rentItem__header"><img src="<?=$v["PREVIEW_PICTURE"]["SRC"];?>" alt="<?=$v["NAME"]?>" class="rentItem__picture"	title="<?=$v["NAME"]?>" /></div>
						<div class="rentItem__content">
							<h2 class="rentItem__name"><?=$v["NAME"]?></h2>
							<table class="rentItem__characteristics">
								<tr>
									<td>Тип:</td>
									<td><?=$v["PROPERTY_VEHICLE_TYPE_VALUE"];?></td>
								</tr>
								<tr>
									<td>Мест:</td>
									<td class="rentItem__seats"><?=$v["PROPERTY_CAPACITY_VALUE"];?></td>
								</tr>
								<tr>
									<td>Класс:</td>
									<td class="rentItem__type"><?=$v["PROPERTY_COMFORT_VALUE"];?></td>
								</tr>
							</table>
							<p class="rentItem__price"><strong>от &nbsp;<span><?=$v["PROPERTY_PRICE_VALUE"];?></span>&nbsp; руб/час</strong></p>
						</div>
					</a>
				</article>
			</li><?
		}?>
		</ul>
	</div>
</section><?
}*/?>