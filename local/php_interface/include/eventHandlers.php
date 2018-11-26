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
	
	if($arFields["IBLOCK_ID"] == 3){
		$arSelect = Array(
			"ID",
			"NAME",
			"PROPERTY_SERVICE_TYPE.NAME",
			"PROPERTY_SERVICE_TYPE.CODE",
			"PROPERTY_CAR_MARK",
		);
		$arFilter = Array("IBLOCK_ID"=>$arFields["IBLOCK_ID"], "ID"=>$arFields["ID"]);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement())
		{
			$arItem = $ob->GetFields();
			$arEventFields  = array(
				"ID"=>$arItem["ID"],
				"IBLOCK_ID" => $arItem["IBLOCK_ID"],
				"NAME" => $arItem["NAME"],
				"SERVICE_TYPE" => $arItem["PROPERTY_SERVICE_TYPE_NAME"],
				"CAR_MARK" => $arItem["PROPERTY_CAR_MARK_VALUE"],
				"EMAIL_TO" => "sto.surgut@mail.ru, vilau39@mail.ru, magro1204@gmail.com",
			);
			switch ($arItem["PROPERTY_SERVICE_TYPE_CODE"]) {
				case 'magazin-avtozapchastey':
					$arEventFields['EMAIL_TO'] = 'vtorygin.sergei@yandex.ru, magro1204@gmail.com';
					break;	
				case 'remont-akpp':
				case 'zamena-masla-v-akpp':
					$arEventFields['EMAIL_TO'] = 'parts@carzina.net, stosrgt.1@mail.ru, sersid_bro@mail.ru, carzina86@yandex.ru, magro1204@gmail.com';
					break;
				case 'avtomoyka-v-surgute':
					$arEventFields['EMAIL_TO'] = 'carzina_m@mail.ru';
					break;
			}
		}
		if(!empty($arEventFields)){
			CEvent::Send("A1_SERVICE", SITE_ID, $arEventFields , "Y", 8);
		}
	}
	
	
	if($arFields["IBLOCK_ID"] == 4){
		$arSelect = Array(
			"ID",
			"NAME",
			"CAR_MARK_PART",
			"CAR_YEAR_PART",
			"PHONE_PART",
			"PREVIEW_TEXT",
		);
		$arFilter = Array("IBLOCK_ID"=>$arFields["IBLOCK_ID"], "ID"=>$arFields["ID"]);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement())
		{
			$arItem = $ob->GetFields();
			$arEventFields  = array(
				"ID"=>$arFields["ID"],
				"IBLOCK_ID" => $arFields["IBLOCK_ID"],
				"NAME" => $arItem["NAME"],
				"CAR_MARK_PART" => $arFields["PROPERTY_VALUES"]["7"],
				"CAR_YEAR_PART" => $arFields["PROPERTY_VALUES"]["8"],
				"PHONE_PART" => $arFields["PROPERTY_VALUES"]["10"],
				"PREVIEW_TEXT" => $arItem["PREVIEW_TEXT"],
			);
		}
		if(!empty($arEventFields )){
			CEvent::Send("A1_PARTS", SITE_ID, $arEventFields , "Y", 9);
		}
	}
	
	// íîâûé âîïðîñ íà ñàéòå â FAQ
	if($arFields["IBLOCK_ID"] == 9){
		$arSelect = Array(
			"ID",
			"NAME",
			"EMAIL",
			"PREVIEW_TEXT",
		);
		$arFilter = Array("IBLOCK_ID"=>$arFields["IBLOCK_ID"], "ID"=>$arFields["ID"]);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement())
		{
			$arItem = $ob->GetFields();
			$arEventFields  = array(
				"ID"=>$arFields["ID"],
				"IBLOCK_ID" => $arFields["IBLOCK_ID"],
				"NAME" => $arItem["NAME"],
				"EMAIL" => $arFields["PROPERTY_VALUES"]["24"],
				"PREVIEW_TEXT" => $arItem["PREVIEW_TEXT"],
			);
		}
		if(!empty($arEventFields )){
			CEvent::Send("A1_NEW_FAQ", SITE_ID, $arEventFields , "Y", 10);
		}
	}

	if($arFields["IBLOCK_ID"] == 11){
		$arSelect = Array(
			"ID",
			"NAME",
			"rating",
			"EMAIL",
			"PREVIEW_TEXT",
		);
		$arFilter = Array("IBLOCK_ID"=>$arFields["IBLOCK_ID"], "ID"=>$arFields["ID"]);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement())
		{
			$arItem = $ob->GetFields();
			$arEventFields  = array(
				"ID"=>$arFields["ID"],
				"IBLOCK_ID" => $arFields["IBLOCK_ID"],
				"NAME" => $arItem["NAME"],
				"rating" => $arFields["PROPERTY_VALUES"]["21"],
				"EMAIL" => $arFields["PROPERTY_VALUES"]["22"],
				"PREVIEW_TEXT" => $arItem["PREVIEW_TEXT"],
			);
		}
		if(!empty($arEventFields )){
			CEvent::Send("A1_REVIEW", SITE_ID, $arEventFields , "Y", 11);
		}
	}
	//Записаться на осмотр и диагностику
	if($arFields["IBLOCK_ID"] == 18)
	{
		$arSelect = Array(
			"ID",
			"NAME",
			"PHONE",
			"PREVIEW_TEXT",
		);
		$arFilter = Array("IBLOCK_ID"=>$arFields["IBLOCK_ID"], "ID"=>$arFields["ID"]);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement())
		{
			$arItem = $ob->GetFields();
			$arEventFields  = array(
				"ID"=>$arFields["ID"],
				"IBLOCK_ID" => $arFields["IBLOCK_ID"],
				"NAME" => $arItem["NAME"],
				"PHONE" => $arFields["PROPERTY_VALUES"]["35"],
				"TEXT" => $arItem["PREVIEW_TEXT"],
			);
		}
		if(!empty($arEventFields )){
			CEvent::Send("A1_DIAGNOSTICS", SITE_ID, $arEventFields , "Y", 13);
		}
	}
	//Обратный звонок
	if($arFields["IBLOCK_ID"] == 19)
	{
		$arSelect = Array(
			"ID",
			"NAME",
			"PHONE",
		);
		$arFilter = Array("IBLOCK_ID"=>$arFields["IBLOCK_ID"], "ID"=>$arFields["ID"]);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement())
		{
			$arItem = $ob->GetFields();
			$arEventFields  = array(
				"ID"=>$arFields["ID"],
				"IBLOCK_ID" => $arFields["IBLOCK_ID"],
				"NAME" => $arItem["NAME"],
				"PHONE" => $arFields["PROPERTY_VALUES"]["36"],
			);
		}
		if(!empty($arEventFields )){
			CEvent::Send("A1_DIAGNOSTICS", SITE_ID, $arEventFields , "Y", 14);
		}
	}
}
?>