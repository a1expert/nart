<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Context,
Bitrix\Main\Type\DateTime,
Bitrix\Main\Loader,
\Bitrix\Main\Application,
Bitrix\Iblock;
include_once(Loader::getDocumentRoot() . "/local/inc_files/commoninfo/classes.php");
$cache = Application::getInstance()->getManagedCache();
$fixer = new Fixer();
$realPage = $fixer->GetRealPage();
$arOrder = $fixer->SetOrder();
$arFilter = $fixer->SetFilter(array("IBLOCK_ID"=>COMMON_INFO_ID, "ID"=>"1"));
$arSelect = $fixer->SetSelect(array("PROPERTY_HEADER_PHONE", "PROPERTY_HEADER_LOGO", "PROPERTY_FOOTER_PHONE", "PROPERTY_FOOTER_ADDRESS", "PROPERTY_FOOTER_EMAIL", "PROPERTY_PRIVATE_POLICY"));
if ($cache->read(36000000, "commoninfo"))
{
    $contacts = $commonInfo = $cache->get("commoninfo");
    
}
else
{
    $arResult = $fixer->GetElements($arOrder, $arFilter, false, false, $arSelect);
    $message = $fixer->GetElements($arOrder, array("IBLOCK_ID"=>12, "ID"=>47), false, false, array("PREVIEW_TEXT", "IBLOCK_ID", "ID"));
    $cachedVars["message"] = $message;
    $cachedVars["headerPhone"] = $arResult[0]["PROPERTY_HEADER_PHONE_VALUE"];
    $cachedVars["headerLogo"] = $arResult[0]["PROPERTY_HEADER_LOGO_VALUE"]["SRC"];
    $cachedVars["footerPhone"] = $arResult[0]["PROPERTY_FOOTER_PHONE_VALUE"];
    $cachedVars["footerAddress"] = $arResult[0]["PROPERTY_FOOTER_ADDRESS_VALUE"];
    $cachedVars["footerEmail"] = $arResult[0]["PROPERTY_FOOTER_EMAIL_VALUE"];
    $cachedVars["privatePolicy"] = $arResult[0]["PROPERTY_PRIVATE_POLICY_VALUE"]["SRC"];
    if($dir == "/contacts/")
    {
        $arOrder = $fixer->SetOrder();
        $arFilter = $fixer->SetFilter(array("IBLOCK_ID"=>COMMON_INFO_ID, "ID"=>"46"));
        $arSelect = $fixer->SetSelect(array("PROPERTY_ADDRESS", "PROPERTY_ADDRESS_COMMENT", "PROPERTY_MAIN_PHONE", "PROPERTY_CHIEF_PHONE", "PROPERTY_WORK_TIME", "PROPERTY_WORK_DAYS", "PROPERTY_REQUISITES"));
        $arResult = $fixer->GetElements($arOrder, $arFilter, false, false, $arSelect);
        $arResult[0]["PROPERTY_REQUISITES_VALUE"] = $fixer->GetElements(array(), array("IBLOCK_ID"=>DOCS_ID, "ID"=>$arResult[0]["PROPERTY_REQUISITES_VALUE"]), false, false, array("ID", "IBLOCK_ID", "NAME", "PROPERTY_DOCUMENT"));
        $cachedVars["address"] = $arResult[0]["PROPERTY_ADDRESS_VALUE"];
        $cachedVars["addressComment"] = $arResult[0]["~PROPERTY_ADDRESS_COMMENT_VALUE"]["TEXT"];
        $cachedVars["mainPhone"] = $arResult[0]["PROPERTY_MAIN_PHONE_VALUE"];
        $cachedVars["chiefPhone"] = $arResult[0]["PROPERTY_CHIEF_PHONE_VALUE"];
        $cachedVars["workTime"] = $arResult[0]["PROPERTY_WORK_TIME_VALUE"];
        $cachedVars["workDays"] = $arResult[0]["PROPERTY_WORK_DAYS_VALUE"];
        $cachedVars["workDays"] = $arResult[0]["PROPERTY_WORK_DAYS_VALUE"];
        $cachedVars["requisites"] = $arResult[0]["PROPERTY_REQUISITES_VALUE"][0]["PROPERTY_DOCUMENT_VALUE"]["SRC"];
    }
    $cache->set("commoninfo", $cachedVars);
    $commonInfo = $cachedVars;
    $contacts = $cachedVars;
}