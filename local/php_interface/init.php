<?
require_once("include/constants.php");
require_once('include/functions.php');
require_once('include/ImageHelper.php');
\Bitrix\Main\Loader::registerAutoLoadClasses(
    null,
    array(
        'PHPMailer\PHPMailer\PHPMailer' => '/local/php_interface/include/PHPMailer/src/PHPMailer.php',
        'PHPMailer\PHPMailer\Exception' => '/local/php_interface/include/PHPMailer/src/Exception.php',
        'PHPMailer\PHPMailer\SMTP' => '/local/php_interface/include/PHPMailer/src/SMTP.php',
    )
);

function custom_mail($to, $subject, $message, $additional_headers, $additional_parameters)
{
    //парсим дополнительные заголовки в массив (опционально)
    /*Ключи заголовков Array([From],[CC],[Reply-To],[X-EVENT_NAME],[X-Priority],[Date],[X-MID])*/
    $arHeaders = [];
    if (!empty($additional_headers)) {
        $explode = explode("\n", $additional_headers);
        foreach ($explode as $strHeader) {
            if (preg_match('/^([^\:]+)\:(.*)$/', $strHeader, $matches)) {
                $key = trim($matches[1]);
                $value = trim($matches[2]);
                $arHeaders[$key] = $value;
            }
        }
    }
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        //Server settings
        //$mail->SMTPDebug = 4; 
        $mail->isSMTP();                                  // Set mailer to use SMTP
        $mail->Host = 'smtp.mail.ru';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                           // Enable SMTP authentication
        $mail->Username = $arHeaders["From"];        // SMTP username
        $mail->Password = '';                  // SMTP password
        $mail->Port = 465;                                // SSL port to connect to
        $mail->SMTPSecure = 'ssl';
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom($arHeaders["From"]);
        // $mail->addReplyTo('manager@koreamarket.su'); //адрес ответа на письмо
        foreach (explode(',', $to) as $email) {
            $email = trim($email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mail->addAddress($email);
            }
        }


        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message; 

        $mail->send();
    } catch (Exception $e) {
        // если все пошло по п..., то отправяем обычным способом 
        if($additional_parameters!="")
            return @mail($to, $subject, $message, $additional_headers, $additional_parameters);

        return @mail($to, $subject, $message, $additional_headers);
    }
}

// AddEventHandler("main", "OnAfterEpilog", "Prefix_FunctionName");
// AddEventHandler("iblock", "OnAfterIBlockElementAdd", "OnAfterIBlockElementAddHandler");
// AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "OnBeforeIBlockElementAddHandler");//для гуглкапчи
// require_once('include/eventHandlers.php');

class GoogleReCaptcha
{

    public static function getPublicKey() {return "";}
    public static function getSecretKey() {return "";}
/**

   * @return array - if validation is failed, returns an array with errors, otherwise - empty array. This format is expected by component.

   */
    public static function checkClientResponse()
    {

        $context = \Bitrix\Main\Application::getInstance()->getContext();

        $request = $context->getRequest();

        $captchaResponse = $request->getPost("recaptcha");

        if($captchaResponse)
        {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array('secret' => static::getSecretKey(), 'response' => $captchaResponse);
            $httpClient = new Bitrix\Main\Web\HttpClient();
            $response = $httpClient->post($url, $data);
            if($response)
                $response = \Bitrix\Main\Web\Json::decode($response, true);
            if(!$response['success']) {                
                return false;
            }
            return true;
        }
        return false;
    }
}
?>