<?
namespace A1expert
{
    class Fixer
    {
        public function __construct()
        {
            
        }
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
        public function SetProps(&$array)
        {
            foreach ($array as $key => $value)
                $array[$key] = "PROPERTY_" . $value;
        }
        public function GetProps($id)
        {
            if(!Loader::includeModule("iblock"))
                throw new Exception("Error, iblock module not included");
            foreach ($id as $k => $v) {
                $ids = explode(":", $v);
                
            }
            $id = explode(":", $ids);
            $id = intval($id[1]);
            $res = CIBlockProperty::GetByID("SRC", false, "company_news");
            if($ar_res = $res->GetNext())
                ShowRes($ar_res);
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
}