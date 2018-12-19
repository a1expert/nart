<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена");
?>
<div class="container" style="text-align:center;">
    <p style="color:red; font-size: 30px;margin-bottom:50px;">Тут должно быть, что-то написано про не найденую страницу</p>
    <img src="/local/assets/images/404.jpg" alt="">
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>