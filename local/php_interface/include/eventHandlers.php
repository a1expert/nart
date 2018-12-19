<?
function OnBeforeIBlockElementAddHandler(&$arFields)
{
    global $APPLICATION;
    if(in_array($arFields["IBLOCK_ID"], array(SIGNUP_DIAGNOSTIC_ID))) {
        if (!GoogleReCaptcha::checkClientResponse()) {
            $APPLICATION->throwException("Подтвертите, что вы не робот!");
            return false;
        }
    }
}
function OnAfterIBlockElementAddHandler(&$arFields)
{
	
	if(in_array($arFields["IBLOCK_ID"], array(15, 16)) && !empty($arFields["ID"]))
	{
		$arFilter = Array("IBLOCK_ID"=>$arFields["IBLOCK_ID"], "ID"=>$arFields["ID"]);
		$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PHONE", "PROPERTY_SERVICE", "PROPERTY_COMMENT_VALUE");
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement())
		{
			$arItem = $ob->GetFields();
			$arEventFields  = array("SERVICE"=>$arItem["PROPERTY_SERVICE_VALUE"], "NAME"=>$arItem["NAME"], "PHONE" => $arItem["PROPERTY_PHONE_VALUE"], "COMMENT"=>$arItem["PROPERTY_COMMENT_VALUE"]);
		}
		if(!empty($arEventFields))
		{
			switch ($arFields["IBLOCK_ID"])
			{
				case 15:
					$event = "CALLBACK";
					break;
				case 16:
					$event = "DERVICES";
					break;
				default:
					break;
			}
			CEvent::Send($event, SITE_ID, $arEventFields);
		}
	}
	
	
}
?>