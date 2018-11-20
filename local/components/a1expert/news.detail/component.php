<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock;
include_once(Loader::getDocumentRoot() . $componentPath . "/classes.php");
use A1expert\Fixer;
	$fixer = new Fixer();
$fixer->CleanArray($arParams);

CPageOption::SetOptionString("main", "nav_page_in_session", "N");

if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 36000000;
if(strlen($arParams["IBLOCK_TYPE"])<=0)
	$arParams["IBLOCK_TYPE"] = "news";
$arParams["ELEMENT_ID"] = intval($arParams["~ELEMENT_ID"]);
if($arParams["ELEMENT_ID"] > 0 && $arParams["ELEMENT_ID"]."" != $arParams["~ELEMENT_ID"])
{
	if (Loader::includeModule("iblock"))
	{
		Iblock\Component\Tools::process404(
			trim($arParams["MESSAGE_404"]) ?: GetMessage("T_NEWS_DETAIL_NF")
			,true
			,$arParams["SET_STATUS_404"] === "Y"
			,$arParams["SHOW_404"] === "Y"
			,$arParams["FILE_404"]
		);
	}
	return;
}
if($this->startResultCache(false, array($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups())))
{

	if(!Loader::includeModule("iblock"))
	{
		$this->abortResultCache();
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}
	if($arParams["ELEMENT_ID"] <= 0)
	{
		$eleKey = "ELEMENT_CODE";
		$eleVal = $arParams["ELEMENT_CODE"];
	}else {
		$eleKey = "ID";
		$eleVal = $arParams["ELEMENT_ID"];
	}
	$fixer->SetProps($arParams["PROPERTY_CODE"]);
	
	$arOrder = $fixer->SetOrder();
	$arFilter = $fixer->SetFilter(array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], $eleKey=>$eleVal));
	$arSelect = $fixer->SetSelect($arParams["FIELD_CODE"], $arParams["PROPERTY_CODE"]);

	$rsElement = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
	if($obElement = $rsElement->GetNextElement())
	{
		$arResult = $obElement->fields;
		ShowRes($arResult);
		$ipropValues = new Iblock\InheritedProperty\ElementValues($arResult["IBLOCK_ID"], $arResult["ID"]);
		$arResult["IPROPERTY_VALUES"] = $ipropValues->getValues();

		Iblock\Component\Tools::getFieldImageData(
			$arResult,
			array('PREVIEW_PICTURE', 'DETAIL_PICTURE'),
			Iblock\Component\Tools::IPROPERTY_ENTITY_ELEMENT,
			'IPROPERTY_VALUES'
		);

		$arResult["FIELDS"] = array();
		foreach($arParams["FIELD_CODE"] as $code)
			if(array_key_exists($code, $arResult))
				$arResult["FIELDS"][$code] = $arResult[$code];

		if($bGetProperty)
			$arResult["PROPERTIES"] = $obElement->GetProperties();
		$arResult["DISPLAY_PROPERTIES"]=array();
		foreach($arParams["PROPERTY_CODE"] as $pid)
		{
			$prop = &$arResult["PROPERTIES"][$pid];
			if(
				(is_array($prop["VALUE"]) && count($prop["VALUE"])>0)
				|| (!is_array($prop["VALUE"]) && strlen($prop["VALUE"])>0)
			)
			{
				$arResult["DISPLAY_PROPERTIES"][$pid] = CIBlockFormatProperties::GetDisplayValue($arResult, $prop, "news_out");
			}
		}

		$arResult["IBLOCK"] = GetIBlock($arResult["IBLOCK_ID"], $arResult["IBLOCK_TYPE"]);

		$arResult["SECTION"] = array("PATH" => array());
		$arResult["SECTION_URL"] = "";
		if($arParams["ADD_SECTIONS_CHAIN"] && $arResult["IBLOCK_SECTION_ID"] > 0)
		{
			$rsPath = CIBlockSection::GetNavChain(
				$arResult["IBLOCK_ID"],
				$arResult["IBLOCK_SECTION_ID"],
				array(
					"ID", "CODE", "XML_ID", "EXTERNAL_ID", "IBLOCK_ID",
					"IBLOCK_SECTION_ID", "SORT", "NAME", "ACTIVE",
					"DEPTH_LEVEL", "SECTION_PAGE_URL"
				)
			);
			$rsPath->SetUrlTemplates("", $arParams["SECTION_URL"]);
			while($arPath = $rsPath->GetNext())
			{
				$ipropValues = new Iblock\InheritedProperty\SectionValues($arParams["IBLOCK_ID"], $arPath["ID"]);
				$arPath["IPROPERTY_VALUES"] = $ipropValues->getValues();
				$arResult["SECTION"]["PATH"][] = $arPath;
				$arResult["SECTION_URL"] = $arPath["~SECTION_PAGE_URL"];
			}
		}

		$resultCacheKeys = array(
			"ID",
			"IBLOCK_ID",
			"NAV_CACHED_DATA",
			"NAME",
			"IBLOCK_SECTION_ID",
			"IBLOCK",
			"LIST_PAGE_URL", "~LIST_PAGE_URL",
			"SECTION_URL",
			"CANONICAL_PAGE_URL",
			"SECTION",
			"IPROPERTY_VALUES",
			"TIMESTAMP_X",
		);

		if (
			$arParams["SET_TITLE"]
			|| $arParams["ADD_ELEMENT_CHAIN"]
			|| $arParams["SET_BROWSER_TITLE"] === 'Y'
			|| $arParams["SET_META_KEYWORDS"] === 'Y'
			|| $arParams["SET_META_DESCRIPTION"] === 'Y'
		)
		{
			$arResult["META_TAGS"] = array();
			$resultCacheKeys[] = "META_TAGS";

			if ($arParams["SET_TITLE"])
			{
				$arResult["META_TAGS"]["TITLE"] = (
					$arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"] != ""
					? $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]
					: $arResult["NAME"]
				);
			}

			if ($arParams["ADD_ELEMENT_CHAIN"])
			{
				$arResult["META_TAGS"]["ELEMENT_CHAIN"] = (
					$arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"] != ""
					? $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]
					: $arResult["NAME"]
				);
			}

			if ($arParams["SET_BROWSER_TITLE"] === 'Y')
			{
				$browserTitle = \Bitrix\Main\Type\Collection::firstNotEmpty(
					$arResult["PROPERTIES"], array($arParams["BROWSER_TITLE"], "VALUE")
					,$arResult, $arParams["BROWSER_TITLE"]
					,$arResult["IPROPERTY_VALUES"], "ELEMENT_META_TITLE"
				);
				$arResult["META_TAGS"]["BROWSER_TITLE"] = (
					is_array($browserTitle)
					? implode(" ", $browserTitle)
					: $browserTitle
				);
				unset($browserTitle);
			}
			if ($arParams["SET_META_KEYWORDS"] === 'Y')
			{
				$metaKeywords = \Bitrix\Main\Type\Collection::firstNotEmpty(
					$arResult["PROPERTIES"], array($arParams["META_KEYWORDS"], "VALUE")
					,$arResult["IPROPERTY_VALUES"], "ELEMENT_META_KEYWORDS"
				);
				$arResult["META_TAGS"]["KEYWORDS"] = (
					is_array($metaKeywords)
					? implode(" ", $metaKeywords)
					: $metaKeywords
				);
				unset($metaKeywords);
			}
			if ($arParams["SET_META_DESCRIPTION"] === 'Y')
			{
				$metaDescription = \Bitrix\Main\Type\Collection::firstNotEmpty(
					$arResult["PROPERTIES"], array($arParams["META_DESCRIPTION"], "VALUE")
					,$arResult["IPROPERTY_VALUES"], "ELEMENT_META_DESCRIPTION"
				);
				$arResult["META_TAGS"]["DESCRIPTION"] = (
					is_array($metaDescription)
					? implode(" ", $metaDescription)
					: $metaDescription
				);
				unset($metaDescription);
			}
		}

		$this->setResultCacheKeys($resultCacheKeys);

		$this->includeComponentTemplate();
	}
	else
	{
		$this->abortResultCache();
		Iblock\Component\Tools::process404(
			trim($arParams["MESSAGE_404"]) ?: GetMessage("T_NEWS_DETAIL_NF")
			,true
			,$arParams["SET_STATUS_404"] === "Y"
			,$arParams["SHOW_404"] === "Y"
			,$arParams["FILE_404"]
		);
	}
}

if(isset($arResult["ID"]))
{
	$arTitleOptions = null;
	if(Loader::includeModule("iblock"))
	{
		CIBlockElement::CounterInc($arResult["ID"]);

		if($USER->IsAuthorized())
		{
			if(
				$APPLICATION->GetShowIncludeAreas()
				|| $arParams["SET_TITLE"]
				|| isset($arResult[$arParams["BROWSER_TITLE"]])
			)
			{
				$arReturnUrl = array(
					"add_element" => CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "DETAIL_PAGE_URL"),
					"delete_element" => (
						empty($arResult["SECTION_URL"])?
						$arResult["LIST_PAGE_URL"]:
						$arResult["SECTION_URL"]
					),
				);

				$arButtons = CIBlock::GetPanelButtons(
					$arResult["IBLOCK_ID"],
					$arResult["ID"],
					$arResult["IBLOCK_SECTION_ID"],
					Array(
						"RETURN_URL" => $arReturnUrl,
						"SECTION_BUTTONS" => false,
					)
				);

				if($APPLICATION->GetShowIncludeAreas())
					$this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));

				if($arParams["SET_TITLE"] || isset($arResult[$arParams["BROWSER_TITLE"]]))
				{
					$arTitleOptions = array(
						'ADMIN_EDIT_LINK' => $arButtons["submenu"]["edit_element"]["ACTION"],
						'PUBLIC_EDIT_LINK' => $arButtons["edit"]["edit_element"]["ACTION"],
						'COMPONENT_NAME' => $this->getName(),
					);
				}
			}
		}
	}

	$this->setTemplateCachedData($arResult["NAV_CACHED_DATA"]);

	if ($arParams['SET_CANONICAL_URL'] === 'Y' && $arResult["CANONICAL_PAGE_URL"])
	{
		$APPLICATION->SetPageProperty('canonical', $arResult["CANONICAL_PAGE_URL"]);
	}

	if($arParams["SET_TITLE"])
		$APPLICATION->SetTitle($arResult["META_TAGS"]["TITLE"], $arTitleOptions);

	if ($arParams["SET_BROWSER_TITLE"] === 'Y')
	{
		if ($arResult["META_TAGS"]["BROWSER_TITLE"] !== '')
			$APPLICATION->SetPageProperty("title", $arResult["META_TAGS"]["BROWSER_TITLE"], $arTitleOptions);
	}

	if ($arParams["SET_META_KEYWORDS"] === 'Y')
	{
		if ($arResult["META_TAGS"]["KEYWORDS"] !== '')
			$APPLICATION->SetPageProperty("keywords", $arResult["META_TAGS"]["KEYWORDS"], $arTitleOptions);
	}

	if ($arParams["SET_META_DESCRIPTION"] === 'Y')
	{
		if ($arResult["META_TAGS"]["DESCRIPTION"] !== '')
			$APPLICATION->SetPageProperty("description", $arResult["META_TAGS"]["DESCRIPTION"], $arTitleOptions);
	}

	if($arParams["INCLUDE_IBLOCK_INTO_CHAIN"] && isset($arResult["IBLOCK"]["NAME"]))
	{
		$APPLICATION->AddChainItem($arResult["IBLOCK"]["NAME"], $arResult["~LIST_PAGE_URL"]);
	}

	if($arParams["ADD_SECTIONS_CHAIN"] && is_array($arResult["SECTION"]))
	{
		foreach($arResult["SECTION"]["PATH"] as $arPath)
		{
			if ($arPath["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != "")
				$APPLICATION->AddChainItem($arPath["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"], $arPath["~SECTION_PAGE_URL"]);
			else
				$APPLICATION->AddChainItem($arPath["NAME"], $arPath["~SECTION_PAGE_URL"]);
		}
	}
	if ($arParams["ADD_ELEMENT_CHAIN"])
		$APPLICATION->AddChainItem($arResult["META_TAGS"]["ELEMENT_CHAIN"]);

	if ($arParams["SET_LAST_MODIFIED"] && $arResult["TIMESTAMP_X"])
	{
		Context::getCurrent()->getResponse()->setLastModified(DateTime::createFromUserTime($arResult["TIMESTAMP_X"]));
	}

	return $arResult["ID"];
}
else
{
	return 0;
}