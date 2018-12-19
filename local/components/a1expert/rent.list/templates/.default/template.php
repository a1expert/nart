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
$allSeats = array(); $filterSeats = array();
foreach ($arResult["ITEMS"] as $v)
	$allSeats[] = $v["PROPERTIES"]["CAPACITY"]["VALUE"];
$filterSeats = array_unique($allSeats);
sort($filterSeats);

?>
<template id="rentItem">
	<article class="rentItem"><a href="#" class="rentItem__link">
			<div class="rentItem__header"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
					alt="услугаблабла" class="rentItem__picture" title="" /></div>
			<div class="rentItem__content">
				<h2 class="rentItem__name"></h2>
				<table class="rentItem__characteristics">
					<tr>
						<td>Тип:</td>
						<td>Автобус</td>
					</tr>
					<tr>
						<td>Мест:</td>
						<td class="rentItem__seats"></td>
					</tr>
					<tr>
						<td>Класс:</td>
						<td class="rentItem__type"></td>
					</tr>
				</table>
				<p class="rentItem__price"><strong>от &nbsp;<span></span>&nbsp; руб/час</strong></p>
			</div>
		</a></article>
</template>
<script>
	let cards = [
		<?foreach($arResult["ITEMS"] as $k=>$arItem)
		{?>
			{
				image: '<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>',
				name: '<?=$arItem["NAME"];?>',
				url: '<?=$arItem["DETAIL_PAGE_URL"];?>',
				seats: '<?=$arItem["PROPERTIES"]["CAPACITY"]["VALUE"];?>',
				type: '<?=$arItem["PROPERTIES"]["COMFORT"]["VALUE_ENUM"];?>',
				price: '<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>',
				label: '<?=($arItem["PROPERTIES"]["CHILDS_MARK"]["VALUE_XML_ID"]) ? "Рекомендуем для перевозки детей" : "";?>'
			},<?
		}?>
	];
</script>
<div class="filters">
	<div class="container">
		<section action="#" autocomplete="off" class="filters__block">
			<h2 class="heading visuallyHidden">Фильтрация</h2>
			<div class="filters__group">
				<p class="filters__groupName">Кол-во мест:</p>
				<div class="filters__row">
				<?foreach ($filterSeats as $value)
				{?>
					<button type="button" data-filterBy="seats" data-value="<?=$value?>" class="filters__control"><?=$value;?></button><?
				}?>
				</div>
			</div>
			<div class="filters__group">
				<p class="filters__groupName">Комфортабельность:</p>
				<div class="filters__row"><button type="button" data-filterBy="type" data-value="Комфорт" class="filters__control">Комфорт</button><button
						type="button" data-filterBy="type" data-value="Стандарт" class="filters__control">Стандарт</button></div>
			</div>
			<div class="filters__group">
				<p class="filters__groupName">Сортировать по:</p>
				<div class="filters__row"><button type="button" data-filterBy="price" data-value="priceUp" class="filters__control">цене
						&nbsp; &#8593;</button><button type="button" data-filterBy="price" data-value="priceDown" class="filters__control">цене
						&nbsp; &#8595;</button></div>
			</div>
		</section>
	</div>
</div>
<div class="rentGrid">
	<div class="container">
		<ul class="rentGrid__list row"></ul>
	</div>
</div>