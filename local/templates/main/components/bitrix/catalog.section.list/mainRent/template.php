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
<ul class="rent__list row">
<?foreach ($arResult["SECTIONS"] as $k=>$item)
{?>
	<li class="rent__layout col-xs-12 col-sm-6 col-md-3">
		<article class="rent__item">
			<div class="rent__header"><img src="<?=$item["PICTURE"]["SRC"];?>" alt="<?=$item["PICTURE"]["ALT"];?>" class="rent__picture" title="<?=$item["PICTURE"]["TITLE"];?>" /></div>
			<h5 class="rent__name"><?=$item["NAME"];?></h5>
			<p class="rent__price"><strong><?=$item["~DESCRIPTION"];?></strong></p><a href="<?=$item["SECTION_PAGE_URL"];?>" class="button">Подробнее</a>
		</article>
	</li><?
}?>
</ul>