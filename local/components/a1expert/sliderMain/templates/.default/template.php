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
if(isset($arItem["DISPLAY_PROPERTIES"]["LIST_IMGS"]["VALUE"]) && count($arItem["DISPLAY_PROPERTIES"]["LIST_IMGS"]["VALUE"] == 1))
{
	$tmp = $arItem["DISPLAY_PROPERTIES"]["LIST_IMGS"]["FILE_VALUE"];
	unset($arItem["DISPLAY_PROPERTIES"]["LIST_IMGS"]["FILE_VALUE"]);
	$arItem["DISPLAY_PROPERTIES"]["LIST_IMGS"]["FILE_VALUE"][0] = $tmp;
}
?>
<div class="hero__carousel">
<?foreach($arResult["ITEMS"] as $arItem)
{
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
	<div style="background-image:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)" class="js_slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="container">
			<div class="hero__content">
				<h1 class="pageHeading"><?=$arItem["NAME"]?></h1>
				<p class="hero__intro"><?=htmlspecialchars_decode($arItem["PROPERTIES"]["DESCRIPTION"]["VALUE"])?></p>
				<ul class="hero__list">
				<?foreach ($arItem["PROPERTIES"]["LIST_TEXT"]["VALUE"] as $k => $v)
				{?>
					<li class="hero__item">
						<div class="hero__icon"><img src="<?=(!empty($arItem["DISPLAY_PROPERTIES"]["LIST_IMGS"]["FILE_VALUE"][$k]["SRC"])) ? $arItem["DISPLAY_PROPERTIES"]["LIST_IMGS"]["FILE_VALUE"][$k]["SRC"] : "/local/assets/images/gap.png";?>" alt="#" title="<?=$v?>" /></div>
						<p><?=htmlspecialchars_decode($v)?></p>
					</li><?
				}?>
				</ul>
				<div class="hero__footer"><a href="<?=$arItem["DISPLAY_PROPERTIES"]["SERVICE_LINK"]["RESULT"][0]["DETAIL_PAGE_URL"]?>" class="button">Узнать больше об услуге</a>
					<p class="hero__or">или звоните по телефону: <br><strong>+7 (3462) 269-57-58</strong></p>
				</div>
			</div>
		</div>
	</div>
<?
}?>
</div>
<div class="container">
	<div class="hero__dots"></div>
</div>