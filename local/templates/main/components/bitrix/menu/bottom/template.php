<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (empty($arResult))throw new Exception("\$arResult пустой");?>
<nav class="footer__menu">
	<ul class="footer__list">
<?foreach($arResult as $arItem)
{?>
			<li class="footer__item"><a href="<?=$arItem["LINK"]?>" class="link link_menu link_brand"><?=$arItem["TEXT"]?></a></li><?
}?>
	</ul>
</nav>