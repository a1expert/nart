<?
namespace a1expert;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


class Fixer
{
    public function CleanArray(&$array)
    {
        
        foreach ($array as $k=>$v)
        {
            if(is_array($v))
                $this->CleanArray($array[$k]);
            if(empty($v) || empty($array[$k]))
                unset($array[$k]);
        }
    }    
}
