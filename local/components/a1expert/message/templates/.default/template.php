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
<section class="content">
	<div class="container">
		<h2 class="heading visuallyHidden">Иформация о компании</h2>
		<div class="content__row">
			<div class="content__text">
				<?=$arResult["~DETAIL_TEXT"];?>
			</div>
		</div>
		<div class="content__row">
			<h2 class="content__heading"><?=$arResult["DISPLAY_PROPERTIES"]["PRINCIPLES"]["NAME"];?></h2>
			<div class="content__text">
				<?=$arResult["DISPLAY_PROPERTIES"]["PRINCIPLES"]["DISPLAY_VALUE"];?>
			</div>
		</div>
		<div class="content__row">
			<div class="row">
			<?foreach ($arResult["DISPLAY_PROPERTIES"]["DOCS"]["RESULT"] as $item)
			{?>
				<div class="col-xs-6 col-sm-4">
					<a href="<?=$item["PROPERTY_DOCUMENT_VALUE"]["SRC"];?>" class="link link_icon" target="_blank" download><span><?=$item["NAME"];?></span></a>
				</div><?
			}?>
			</div>
		</div>
		<div class="content__row">
			<h2 class="content__heading"><?=$arResult["DISPLAY_PROPERTIES"]["COOPERATION"]["NAME"];?></h2>
			<div class="content__text">
				<?=$arResult["DISPLAY_PROPERTIES"]["COOPERATION"]["DISPLAY_VALUE"];?>
			</div>
		</div>
	</div>
</section>