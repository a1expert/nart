<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Data\Cache, Bitrix\Main\Application, A1expert\MainFixer;
$cache = Application::getInstance()->getManagedCache();
$fixer = new MainFixer();
$arOrder = $fixer->SetOrder();
$arFilter = $fixer->SetFilter(array("IBLOCK_ID"=>SERVICES_ID));
$arSelect = $fixer->SetSelect(array("NAME", "DETAIL_PAGE_URL"));
if ($cache->read(36000000, "servicesLeftMenu"))
{
	$elements = $cache->get("servicesLeftMenu");
	foreach ($elements as $v)
		$aMenuLinksExt[] = Array($v["NAME"], $v["DETAIL_PAGE_URL"], Array(), Array(), "");
}
else
{
    $arResult = $fixer->GetElements($arOrder, $arFilter, false, false, $arSelect);
    $cachedVars = $arResult;
    $cache->set("servicesLeftMenu", $cachedVars);
	$elements = $cachedVars;
	foreach ($elements as $v)
		$aMenuLinksExt[] = Array($v["NAME"], $v["DETAIL_PAGE_URL"], Array(), Array(), "");
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>