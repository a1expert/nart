<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (empty($arResult))throw new Exception("\$arResult пустой");?>
<nav class="menu">
	<ul class="menu__list"><?
$previousLevel = 0;
foreach($arResult as $arItem)
{
	if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel)
		echo str_repeat("</ul></div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
	if ($arItem["IS_PARENT"])
	{
		if ($arItem["DEPTH_LEVEL"] == 1)
		{?>
			<li class="menu__item menu__item_dropdown"><a href="<?=$arItem["LINK"]?>" class="menu__link"><?=$arItem["TEXT"]?></a>
				<div class="menu__dropdownLayout">
					<ul class="menu__dropdownList"><?
		}else{/*это на случай если меню будет с более чем одной вложенностью.*/}
	}
	else
	{
		if ($arItem["DEPTH_LEVEL"] == 1)
		{?>
			<li class="menu__item"><a href="<?=$arItem["LINK"]?>" class="menu__link"><?=$arItem["TEXT"]?></a></li><?
		}
		else
		{?>
			<li class="menu__dropdownItem"><a href="<?=$arItem["LINK"]?>" class="menu__dropdownLink"><?=$arItem["TEXT"]?></a></li><?
		}
	}
	$previousLevel = $arItem["DEPTH_LEVEL"];
}
if ($previousLevel > 1)
	echo str_repeat("</ul></div></li>", ($previousLevel-1));
?>
	</ul>
</nav>