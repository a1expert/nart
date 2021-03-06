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
$fixer = new Services();
// ShowRes($arResult);
?>
<div style="background-image:url(<?=(!empty($arResult["DETAIL_PICTURE"]["SRC"])) ? $arResult["DETAIL_PICTURE"]["SRC"] : "/local/assets/images/hero1.png";?>)" class="hero hero_picture">
	<div class="container">
		<div class="breadcrumbs breadcrumbs_service">
			<ul class="breadcrumbs__list">
				<li class="breadcrumbs__item"><a href="/" class="breadcrumbs__link">Главная</a></li>
				<li class="breadcrumbs__item"><a href class="breadcrumbs__link"><?=$arResult["NAME"];?></a></li>
			</ul>
		</div>
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
			<li class="linkBlock__item">
				<a href="<?=$v["PROPERTY_DOC_VALUE"]["SRC"];?>" class="link link_icon" target="_blank" title="<?=$v["PROPERTY_DOC_VALUE"]["ORIGINAL_NAME"] . "&nbsp;" . $fsize?>" download>
					<span><?=$v["NAME"];?></span>
				</a>
			</li><?
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
}?>