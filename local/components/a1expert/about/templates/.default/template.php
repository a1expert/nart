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
$fixer = new About();
// ShowRes($arResult);
?>
<section class="content">
	<div class="container">
		<h2 class="heading visuallyHidden">Иформация о компании</h2>
		<div class="content__row aboutDetailDesc">
			<?=$arResult["DETAIL_TEXT"];?>
		</div>
		<div class="content__row">
			<ul class="linkBlock">
			<?foreach ($arResult["DISPLAY_PROPERTIES"]["DOCS"]["RESULT"] as $k => $v)
			{?>
				<li class="linkBlock__item">
					<a href="<?=$v["PROPERTY_DOCUMENT_VALUE"]["SRC"];?>" target="_blank" class="link link_icon" download><span><?=$v["NAME"];?></span></a>
				</li><?
			}?>
			</ul>
		</div>
	</div>
</section>
<section class="advantages">
	<div class="container">
		<h2 class="heading visuallyHidden">Преимущества сотрудничества с нами</h2>
		<ul class="advantages__list">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["ADVANTAGES"]["RESULT"] as $k => $v)
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
</section>
<section class="principles">
	<div class="container">
		<h2 class="heading">Основные принципы работы</h2>
		<ol class="principles__list">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["BASE_PRINCIPS"]["RESULT"] as $k => $v)
		{?>
			<li class="principles__item">
				<h3 class="principles__title"><?=$v["NAME"];?></h3>
				<div class="principles__text"><?=$v["DETAIL_TEXT"];?></div>
			</li><?
		}?>
		</ol>
	</div>
</section>
<section class="gallery">
	<div class="container">
		<h2 class="heading">Наш автопарк</h2>
		<ul class="row">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["RESULT"] as $k => $v)
		{
			if($k>5)break;?>
			<li class="col-xs-12 col-sm-6 col-md-4">
				<div class="gallery__item">
					<a href="<?=$v["BIG_IMG"];?>" class="gallery__link">
						<img src="<?=$v["SMALL_IMG"];?>" alt="#" class="gallery__preview" title="" />
					</a>
				</div>
			</li><?
		}?>
		</ul>
	</div>
</section>
<div class="licenses">
	<div class="container">
		<h2 class="heading">Лицензии на деятельность</h2>
		<ul class="row">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["LICENSE"]["RESULT"] as $k => $v)
		{?>
			<li class="col-xs-6 col-sm-6 col-md-3">
				<div class="licenses__item">
					<a href="<?=$v["PREVIEW_PICTURE"]["SRC"]?>" class="licenses__link"><img src="<?=$v["PREVIEW_PICTURE"]["SRC"]?>" alt="#" class="licenses__preview" title="<?=$v["NAME"];?>" /></a>
				</div>
			</li><?
		}?>
		</ul>
	</div>
</div>