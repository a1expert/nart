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
<ul class="advantages__list">
<?foreach ($arResult["ITEMS"] as $item)
{?>
	<li class="advantages__item">
		<div class="advantages__icon"><img src="<?=$item["PREVIEW_PICTURE"]["SRC"];?>" alt="<?=$item["PREVIEW_PICTURE"]["ALT"];?>" class="advantages__picture" title="<?=$item["PREVIEW_PICTURE"]["TITLE"];?>" /></div>
		<div class="advantages__content">
			<p class="advantages__title"><strong><?=$item["NAME"];?></strong></p>
			<p class="advantages__text"><strong><?=$item["PREVIEW_TEXT"];?></strong></p>
		</div>
	</li><?
}?>
</ul>