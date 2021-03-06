<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Data\Cache, Bitrix\Main\Application, A1expert\MainFixer;
$cache = Application::getInstance()->getManagedCache();
$fixer = new MainFixer();

$arFilter = $fixer->SetFilter(array("IBLOCK_ID"=>VEHICLE_RENT_ID));
$arSelect = $fixer->SetSelect(array("NAME", "SECTION_PAGE_URL"));
if ($cache->read(36000000, "vehicleRentLeftMenu"))
{
	$elements = $cache->get("vehicleRentLeftMenu");
	foreach ($elements as $v)
		$aMenuLinksExt[] = Array($v["NAME"], $v["SECTION_PAGE_URL"], Array(), Array(), "");
}
else
{
    $arResult = $fixer->GetSections(array(), $arFilter, false, $arSelect);
    $cachedVars = $arResult;
    $cache->set("vehicleRentLeftMenu", $cachedVars);
	$elements = $cachedVars;
	foreach ($elements as $v)
		$aMenuLinksExt[] = Array($v["NAME"], $v["SECTION_PAGE_URL"], Array(), Array(), "");
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>