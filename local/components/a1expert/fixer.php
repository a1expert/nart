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
    }
}