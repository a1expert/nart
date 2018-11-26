<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @global CMain $APPLICATION
 */
global $APPLICATION;
//delayed function must return a string
if(empty($arResult))
	return "";
$strReturn = '';
$strReturn .= '<ul class="breadcrumbs__list">';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$strReturn .= '<li class="breadcrumbs__item">
						<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs__link">'.$title.'</a>
					</li>';
}
$strReturn .= '</ul>';
return $strReturn;