<?
use \Bitrix\Main\Data\Cache;
namespace ImageHelper
{

    class ImageHandler
    {
        const WATER_MARK_PATH = '/local/assets/images/logo_xs.png';

        public static function Resize($arImageID, $arSize = array(), $arWater = false) {

            //Проверка валидации

            if (!intval($arImageID)) return null; 

            if (!is_array($arSize)) return null;

            foreach ($arSize as $key => $value) {
                if (($key != 'width') && ($key != 'height')) return null;
                if (!intval($value)) return null;
            }
            
            if (!is_bool($arWater)) return null;

            //Поиск исходной картинки

            $arImage = \CFile::GetFileArray($arImageID); //Получаем файл

            //Параметры для Resize

            if (isset($arSize['width']) && isset($arSize['height'])) {
                if ($arImage['WIDTH']  * $arSize['height'] > $arSize['width'] * $arImage['HEIGHT']) 
                    $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL_ALT;
                else  $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL;
            }
            elseif (!isset($arSize['width']) && !isset($arSize['height'])) {
                $arSize['width'] = $arImage['WIDTH'] / 2;
                $arSize['height'] = $arImage['HEIGHT'] / 2;
                $resizeType = BX_RESIZE_IMAGE_EXACT;
            }
            elseif (!isset($arSize['width'])) {
                $arSize['width'] = $arSize['height'] * $arImage['WIDTH'] / $arImage['HEIGHT'];
                $resizeType = BX_RESIZE_IMAGE_EXACT;
            }
            elseif (!isset($arSize['height'])) {
                $arSize['height'] = $arSize['width'] * $arImage['HEIGHT'] / $arImage['WIDTH'];
                $resizeType = BX_RESIZE_IMAGE_EXACT;
            }

            if ($arSize['width'] > 600) {
                $arSize['height'] = $arSize['height'] * 600 / $arSize['width'];
                $arSize['width'] = 600;
            }

            if ($arSize['height'] > 600) {
                $arSize['width'] = $arSize['width'] * 600 / $arSize['height'];
                $arSize['height'] = 600;
            }

            $arWaterParams = array();

            if($arWater){

                $arWaterParams = array(array(
                    "name" => "watermark",
                    "position" => "bottomright",
                    "type" => "file",
                    "file" => $_SERVER["DOCUMENT_ROOT"].self::WATER_MARK_PATH,
                    "fill" => 'resize'
                ));

                if($arSize['width'] >= 600 || $arSize['height'] >= 600){
                    $arWaterParams['size'] = 'big';
                } elseif ($arSize['width'] <= 120 || $arSize['height'] <= 120) {
                    $arWaterParams['size'] = 'small';
                } else {
                    $arWaterParams['size'] = 'normal';
                }

            }
            
            //Обработка картинки

            $result = \CFile::ResizeImageGet($arImageID, $arSize, $resizeType, false, $arWaterParams);

            //Возврат адреса картинки

            if (isset($result['src'])) {
                return $result['src'];
            }
            else {
                return null;
            }
        }
    }
}
?>