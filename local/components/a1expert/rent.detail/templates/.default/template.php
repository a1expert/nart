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
// ShowRes($arResult);
?>
<div class="back">
	<div class="container">
		<a href="<?=$arResult["SECTION_URL"];?>" class="back__link">< Назад к списку товаров</a>
	</div>
</div>
<section class="carInfo">
	<div class="carInfo__top">
		<div class="container">
			<h1 class="heading carInfo__heading carInfo__heading carInfo__heading_mobile"><?=$arResult["NAME"];?></h1>
			<div class="row">
				<div class="col-xs-12 col-md-7">
					<div class="carGallery jsGallery">
						<ul class="carGallery__previewsList">
						<?foreach ($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["RESULT"] as $k=>$v)
						{?>
							<li class="carGallery__preview">
								<button type="button" data-type="img" data-src="<?=$v["BIG_IMG"]?>" data-preview="<?=$v["SMALL_IMG"]?>" data-description="кортиночка овтобуса" class="carGallery__button <?=($k == 0) ? "carGallery__button_active" : "";?>"></button>
							</li><?							
						}
						if(!empty($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["VIDEOS"]))
						{
							foreach ($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["VIDEOS"] as $k => $v)
							{?>
								<li class="carGallery__preview">
									<button type="button" data-type="video" data-preview="/local/assets/images/rentitem2.png" data-src="<?=$v["SRC"]?>" style="background-image:url(/local/assets/images/preview.png)" class="carGallery__button carGallery__button_video"></button>
								</li><?
							}
						}?>
						</ul>
						<div class="carGallery__fullsize"><img src="<?=$arResult["DISPLAY_PROPERTIES"]["GALLERY"]["RESULT"][0]["BIG_IMG"]?>" alt="#" /></div>
					</div>
				</div>
				<div class="col-xs-12 col-md-5">
					<div class="carChars">
						<h1 class="heading carInfo__heading carInfo__heading carInfo__heading_desktop"><?=$arResult["NAME"];?></h1>
						<table class="carChars__characteristics">
							<tr>
								<td>Тип транспорта:</td>
								<td><?=$arResult["DISPLAY_PROPERTIES"]["VEHICLE_TYPE"]["VALUE"];?></td>
							</tr>
							<tr>
								<td>Кол-во мест:</td>
								<td><?=$arResult["DISPLAY_PROPERTIES"]["CAPACITY"]["VALUE"];?></td>
							</tr>
							<tr>
								<td>Комфортабельность:</td>
								<td><?=$arResult["DISPLAY_PROPERTIES"]["COMFORT"]["VALUE"];?></td>
							</tr>
							<tr>
								<td>Год выпуска:</td>
								<td><?=$arResult["DISPLAY_PROPERTIES"]["YEAR"]["VALUE"];?></td>
							</tr>
							<tr>
								<td>Минимальный заказ:</td>
								<td>от <?=$arResult["DISPLAY_PROPERTIES"]["HOURS"]["VALUE"];?></td>
							</tr>
							<tr>
								<td>Оснащение</td>
								<td><a href="#">смотреть комплектацию</a></td>
							</tr>
						</table>
						<p class="carChars__price"><strong><?=$arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"];?> руб/час</strong></p>
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
					<?=$arResult["DETAIL_TEXT"];?>
				</div>
			</section>
			<section class="carComplect">
				<h2 class="heading">Комплектация</h2>
				<div class="carComplect__text">
					<?=$arResult["DISPLAY_PROPERTIES"]["EQUIPMENT_TEXT"]["DISPLAY_VALUE"];?>
				</div>
				<ul class="carComplect__icons row">
				<?foreach ($arResult["DISPLAY_PROPERTIES"]["EQUIPMENT"]["RESULT"] as $k => $v)
				{?>
					<li class="carComplect__item col-xs-6 col-sm-4 col-md-3">
						<div class="carComplect__icon"><img src="<?=$v["PREVIEW_PICTURE"]["SRC"];?>" alt="#" /></div>
						<p class="carComplect__iconText"><?=$v["NAME"];?></p>
					</li><?
				}?>
				</ul>
			</section>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<div class="licenses">
						<h2 class="heading">Лицензии на деятельность</h2>
						<ul class="row">
						<?foreach ($arResult["DISPLAY_PROPERTIES"]["LICENSE"]["RESULT"] as $k => $v)
						{?>
							<li class="col-xs-12 col-sm-6 col-md-6">
								<div class="licenses__item">
									<a href="<?=$v["PREVIEW_PICTURE"]["SRC"];?>" target="_blank" class="licenses__link">
										<img src="<?=$v["PREVIEW_PICTURE"]["SRC"];?>" alt="<?=$v["PREVIEW_PICTURE"]["ORIGINAL_NAME"];?>" class="licenses__preview" title="" />
									</a>
								</div>
							</li><?
						}?>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-md-5 col-md-offset-1">
					<h2 class="heading">Документы</h2>
					<ul class="linkBlock linkBlock_column">
					<?foreach ($arResult["DISPLAY_PROPERTIES"]["DOCS"]["RESULT"] as $k => $v)
					{?>
						<li class="linkBlock__item">
							<a href="<?=$v["PROPERTY_DOCUMENT_VALUE"]["SRC"];?>" target="_blank" class="link link_icon" download><span><?=$v["NAME"];?></span></a>
						</li><?
					}?>
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
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["SIMILAR"]["RESULT"] as $k => $v)
		{?>
			<li class="similars__item col-xs-12 col-sm-6 col-md-4">
				<article class="rentItem">
					<a href="<?=$v["DETAIL_PAGE_URL"];?>" class="rentItem__link">
						<div class="rentItem__header">
							<img src="<?=$v["PREVIEW_PICTURE"]["SRC"];?>" alt="<?=$v["NAME"];?>" class="rentItem__picture" title="<?=$v["NAME"];?>" />
						</div>
						<div class="rentItem__content">
							<h2 class="rentItem__name"><?=$v["NAME"];?></h2>
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
</section>