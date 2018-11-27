<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Application,
    Bitrix\Main\Page\Asset,
    Bitrix\Main\Loader,
    Bitrix\Main\Localization\Loc;
    
Loc::loadMessages(__FILE__);
$dir = $APPLICATION->GetCurDir();
$page = $APPLICATION->GetCurPage(true);
$assets = Asset::getInstance();
$docRoot = Application::getDocumentRoot();
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
	<head>
        <?
        $APPLICATION->ShowHead();
        //strings
        $assets->addString('<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">');
        $assets->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
        //CSS
		$assets->addCss('/local/assets/styles/app.min.css');
		//SCRIPTS
		$assets->addJS('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js');
		$assets->addJS('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
		$assets->addJS('https://cdnjs.cloudflare.com/ajax/libs/lory.js/2.5.2/lory.min.js');
        $assets->addJS('/local/assets/scripts/polyfills.js');
        $assets->addJS('/local/assets/scripts/debounce.js');
		$assets->addJS('/local/assets/scripts/select.js');
		$assets->addJS('/local/assets/scripts/accordeon.js');
		$assets->addJS('/local/assets/scripts/js.js');
        ?>
        <link href="/local/assets/images/logo.png" rel="icon" type="image/png">
		<script src='https://www.google.com/recaptcha/api.js' async></script>
		<title><?$APPLICATION->ShowTitle();?></title>
	</head>

	<body class="page">
    <?$APPLICATION->showPanel();
    /**Тут загружается компонент с общей инфой по сайту. Заходим в дефолтный шаблон компонента и там смотрим нужные ключи. Все что нужно поменять или добавиить - пишется в сам компонент (component.php) */
    include_once(Loader::getDocumentRoot() . "/local/inc_files/commoninfo/commoninfo.php");?>
        <header role="banner" class="header">
            <div class="container">
                <div class="row middle-xs between-xs">
                    <div class="col-xs-5 col-md-3 col-lg-2"><a href="/" class="logo"><img src="<?=$commonInfo["headerLogo"]?>" alt="Нарт"
                            width="140" height="60" class="logo__picture" title="" /></a></div>
                    <div class="col-md-6 col-lg-7">
                        <?$APPLICATION->IncludeComponent("bitrix:menu", "top",
                            Array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "4",
                                "MENU_CACHE_GET_VARS" => array(""),
                                "MENU_CACHE_TIME" => "360000",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "top",
                                "USE_EXT" => "Y"
                            ), false, array("HIDE_ICONS"=>"Y")
                        );?>
                    </div>
                    <div class="col-xs-5 col-md-3 col-lg-3">
                        <div class="header__info">
                            <p class="header__phone"><?=$commonInfo["headerPhone"];?></p><button class="header__cta jsPopup">перезвоните мне</button>
                        </div>
                    </div>
                    <div class="col-xs-2 col-md"><button class="header__menuBtn"><span class="mobileLinesBtn"></span><span class="mobileLinesBtn"></span><span class="mobileLinesBtn"></span></button></div>
                </div>
            </div>
        </header>
    <?
    if($page == "/index.php")
    {
        echo '<main class="main">';
    }
    elseif(preg_match("/transport-services\/(.*)\/index.php/", $page) || preg_match("/vehicle-rent\/(.*)\/detail.php/", $page))
    {?>
        <div class="breadcrumbs">
			<div class="container">
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "cocainescrumb", Array("PATH" => "", "SITE_ID" => "s1", "START_FROM" => "0"));?>
			</div>
        </div>
        <main class="main"><?
    }
    else
    {?>
        <div class="breadcrumbs">
			<div class="container">
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "cocainescrumb", Array("PATH" => "", "SITE_ID" => "s1", "START_FROM" => "0"));?>
			</div>
        </div>
        <main class="main">
			<div class="container">
				<h1 class="pageHeading"><?$APPLICATION->ShowTitle();?></h1>
            </div>
    <?
    }?>
