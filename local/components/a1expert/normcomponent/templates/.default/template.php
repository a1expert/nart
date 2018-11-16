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
<div class="photo-list">
	<div class="row">
	<?foreach($arResult["ITEMS"] as $i => $arItem)
	{
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		if($i > 0 && $i % 2 == 0)
			echo '</div><div class="row">';?>
		<div class="col-md-6 col-sm-12 photo-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="col-md-5 col-sm-4">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<?if(!empty($arItem["PREVIEW_PICTURE"]))
				{?>
					<img class="img-responsive" src="<?=$arItem["PREVIEW_PICTURE"]?>" />
				<?
				}?>
				</a>
			</div>
			<div class="<?=(!empty($arItem["PREVIEW_PICTURE"])) ? 'col-md-7 col-sm-8' : 'col-md-12';?>">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="title">
					<?=$arItem["NAME"]?>
				</a>
				<span><?=$arItem["GALLERY_COUNT"]?> фото</span>
				<br>
				<span>&nbsp;</span>
			</div>
		</div>
	<?
	}?>
	</div>
</div>