<?
use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
    Bitrix\Iblock;
    
class Fixer
{
    public function __construct()
    {
        
    }
    /**
     * Очищает массив от пустых значений и делает trim. Все происходит рекурсивно, без ограничения по вложенности.
     * @var array $array - массив для очистки, передается по ссылке
     */
    public function CleanArray(&$array)
    {
        
        foreach ($array as $k=>$v)
        {
            if(is_array($v))
                $this->CleanArray($array[$k]);
            else
                $array[$k] = trim($array[$k]);
            if(empty($v) || empty($array[$k]))
                unset($array[$k]);
        }
    }
    /**
     * 
     */
    public function SetProps(&$array)
    {
        foreach ($array as $key => $value)
            $array[$key] = "PROPERTY_" . $value;
    }
    public function GetProps(&$arResult)
    {
        
        foreach ($arResult as $k=>$v)
        {
            if(preg_match("/^PROPERTY_(.*)_VALUE_ID$/", $k))
                $propsIds[] = $v;
        }
        if(!isset($propsIds))
            return;
        foreach ($propsIds as $k => $v)
        {
            $local = explode(":", $v);
            $ids[] = intval($local[1]);
        }
        Loader::includeModule("iblock");
        foreach($ids as $id)
        {
            $res = CIBlockProperty::GetByID($id);
            if($ar_res = $res->GetNext())
                $arProps[] = $ar_res;
        }
        foreach ($arProps as $k => $v)
        {
            switch ($v["PROPERTY_TYPE"])
            {
                case 'F':
                    $arResult["PROPERTY_". $v["CODE"] . "_VALUE"] = CFile::GetFileArray($arResult["PROPERTY_". $v["CODE"] . "_VALUE"]);
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }
    public function SetOrder($array1=array(), $array2=array())
    {
        if(!is_array($array1))
            $array1 = array();
        if(!is_array($array2))
            $array2 = array();
        $retunArr = array_merge($array1=array(), $array2=array());
        return $retunArr;
    }
    public function SetFilter($array1=array(), $array2=array())
    {
        if(!is_array($array1))
            $array1 = array();
        if(!is_array($array2))
            $array2 = array();
        $tmpArr = array("ACTIVE" => "Y", "CHECK_PERMISSIONS" => "Y");
        $retunArr = array_merge($tmpArr, $array1, $array2);
        return $retunArr;
    }
    public function SetSelect($array1=array(), $array2=array())
    {
        if(!is_array($array1))
            $array1 = array();
        if(!is_array($array2))
            $array2 = array();
        $tmpArr = array("ID", "IBLOCK_ID");
        $retunArr = array_merge($tmpArr, $array1, $array2);
        return $retunArr;
    }
}