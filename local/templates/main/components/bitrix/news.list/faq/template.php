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
<div class="faq">
	<div class="container">
		<ul class="faq__list">
		<?foreach ($arResult["ITEMS"] as $arItem)
		{?>
			<li>
				<article class="faq__item">
					<h3><button class="faq__toggler"><?=$arItem["DISPLAY_PROPERTIES"]["QUESTION"]["DISPLAY_VALUE"];?></button></h3>
					<div class="faq__content">
						<div class="faq__info"><img width="45" height="45" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="Анастасия Бобкова" class="faq__avatar" title="" />
							<p><?=$arItem["DISPLAY_PROPERTIES"]["POSITION"]["DISPLAY_VALUE"];?><br> <strong><?=$arItem["DISPLAY_PROPERTIES"]["NAME"]["DISPLAY_VALUE"];?></strong></p>
						</div>
						<div class="faq__text">
							<?=$arItem["~DETAIL_TEXT"];?>
						</div>
					</div>
				</article>
			</li><?
		}?>
		</ul>
	</div>
</div>