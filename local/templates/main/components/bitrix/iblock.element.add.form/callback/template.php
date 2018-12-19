<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);
?>
<form class="formPopup__form jsForm" name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
	<?=bitrix_sessid_post()?>
	<p class="formPopup__heading"><strong>Заполните форму</strong> и получите бесплатную консультацию</p>
	<input type="hidden" name="PROPERTY[NAME][0]" size="25" value="<?=date('d.m.Y H:i:s')?>">
	<input type="hidden" name="iblock_submit" value="Y"/>
	<fieldset class="formPopup__block">
		<input type="tel" id="popupTel" required="required" pattern="^[ 0-9]+$" class="input jsFloating" name="PROPERTY[64][0]" />
		<label for="popupTel" class="floatingLabel">Ваш телефон</label>
	</fieldset>
	<fieldset class="formPopup__block">
		<button class="button formPopup__submit">Отправить</button>
	</fieldset>
	<small class="formPopup__privacy">Заполняя настоящую форму вы даете свое  согласие на обработку своих <a href="#" target="_blank" rel="noopener nofollow">персональных данных</a></small>
</form>
