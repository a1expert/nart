<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Context,
Bitrix\Main\Type\DateTime,
Bitrix\Main\Loader,
\Bitrix\Main\Application,
Bitrix\Iblock;
include_once(Loader::getDocumentRoot() . "/local/inc_files/commoninfo/classes.php");
$cache = Application::getInstance()->getManagedCache();
$fixer = new Fixer();

$arOrder = $fixer->SetOrder();
$arFilter = $fixer->SetFilter(array("IBLOCK_ID"=>"1", "ID"=>"1"));
$arSelect = $fixer->SetSelect(array("PROPERTY_HEADER_PHONE", "PROPERTY_HEADER_LOGO"));
if ($cache->read(36000000, "commoninfo"))
{
    $commonInfo = $cache->get("commoninfo");
}
else
{
    $arResult = $fixer->GetElements($arOrder, $arFilter, false, false, $arSelect);
    $cachedVars["headerPhone"] = $arResult["PROPERTY_HEADER_PHONE_VALUE"];
    $cachedVars["headerLogo"] = $arResult["PROPERTY_HEADER_LOGO_VALUE"]["SRC"];
    $cache->set("commoninfo", $cachedVars);
    $commonInfo = $cachedVars;
}
