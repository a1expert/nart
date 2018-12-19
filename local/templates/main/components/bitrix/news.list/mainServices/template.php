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
<ul class="services__list row">
	<?foreach ($arResult["ITEMS"] as $k=>$item)
	{?>
	<li class="services__layout col-xs-12 col-sm-6 col-md-4">
		<article class="services__item">
			<div class="services__header"><img src="<?=$item["PREVIEW_PICTURE"]["SRC"];?>" alt="<?=$item["PREVIEW_PICTURE"]["ALT"];?>" class="services__picture" title="<?=$item["PREVIEW_PICTURE"]["TITLE"];?>" /></div>
			<h5 class="services__name"><?=$item["NAME"];?></h5><a href="<?=$item["DETAIL_PAGE_URL"];?>" class="button">Подробнее</a>
		</article>
	</li><?
	}?>
</ul>