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
<div class="vacancies">
	<div class="container">
		<ul class="vacancies__list">
			<?foreach ($arResult["ITEMS"] as $arItem)
			{?>
			<li class="vacancies__item">
				<article class="vacancy">
					<div class="vacancy__header">
						<h2 class="vacancy__heading"><?=$arItem["NAME"];?></h2>
					</div>
					<div class="vacancy__content">
						<div class="vacancy__col">
							<ul class="vacancy__list">
							<?if(!is_array($arItem["DISPLAY_PROPERTIES"]["REQUIMENTS"]["DISPLAY_VALUE"]))
								$arItem["DISPLAY_PROPERTIES"]["REQUIMENTS"]["DISPLAY_VALUE"] = array(0=>$arItem["DISPLAY_PROPERTIES"]["REQUIMENTS"]["DISPLAY_VALUE"]);
							foreach ($arItem["DISPLAY_PROPERTIES"]["REQUIMENTS"]["DISPLAY_VALUE"] as $item)
							{?>
								<li class="vacancy__item"><?=$item;?></li><?
							}?>
							</ul>
						</div>
						<div class="vacancy__col">
							<div class="vacancy__contact">
								<img src="<?=$arItem["DISPLAY_PROPERTIES"]["CONTACT_FACE"]["FILE_VALUE"]["SRC"]?>" alt="#" class="vacancy__avatar" title="" />
								<p class="vacancy__name">Контактное лицо:<br>
									<strong><?=$arItem["DISPLAY_PROPERTIES"]["CONTACT_FACE"]["DESCRIPTION"];?></strong></p>
							</div>
							<p class="vacancy__phone"><strong><?=$arItem["DISPLAY_PROPERTIES"]["PHONE"]["DISPLAY_VALUE"];?></strong></p>
							<p class="vacancy__worktime"><?=$arItem["DISPLAY_PROPERTIES"]["TIME"]["DISPLAY_VALUE"];?></p>
							<a href="mailto:info@autonart.ru" class="vacancy__mail"><?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["DISPLAY_VALUE"];?></a>
						</div>
					</div>
				</article>
			</li><?
		}?>
		</ul>
	</div>
</div>