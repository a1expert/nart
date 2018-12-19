<?
use \Bitrix\Main\Application, A1expert\MainFixer;
$cache = Application::getInstance()->getManagedCache();
$fixer = new MainFixer();

if ($cache->read(36000000, "bottom_menu"))
{
    $bottomMenu = $cache->get("bottom_menu");
}
else
{
	$filter = array("IBLOCK_ID"=>"6");
	$select = array("NAME", "SECTION_PAGE_URL", "ID", "IBLOCK_ID");
	$bottomMenu = $fixer->GetSections(array(), $filter, false, $select);
}
foreach ($bottomMenu as $k=>$value)
{
	$aMenuLinks[] = Array($value["NAME"], $value["SECTION_PAGE_URL"], Array(), Array(), "");
}
?>