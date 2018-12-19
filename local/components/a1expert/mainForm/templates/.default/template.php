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
// ShowRes($arResult);
?>

<form autocomplete="off" class="form mainForm" name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
<?=bitrix_sessid_post()?>
	<div class="row">
		<div class="col-xs-12">
			<fieldset class="form__block">
				<div class="select">
					<select required="required" name="PROPERTY[65][0]">
					<?foreach ($arResult["services"] as $item)
					{?>
						<option value="<?=$item["NAME"]?>" class="select__item"><?=$item["NAME"]?></option><?
					}?>
					</select>
				</div>
			</fieldset>
		</div>
		<div class="col-xs-12 col-md-6">
			<fieldset class="form__block">
				<input type="text" name="PROPERTY[NAME][0]" id="formTel" required="required" class="input jsFloating" />
				<label for="formTel" class="floatingLabel floatingLabel_big">Ваше имя</label>
			</fieldset>
		</div>
		<div class="col-xs-12 col-md-6">
			<fieldset class="form__block">
				<input type="tel" name="PROPERTY[66][0]" id="formName" required="required" pattern="^[ 0-9]+$" class="input jsFloating" />
				<label for="formName" class="floatingLabel floatingLabel_big">Ваш телефон</label></fieldset>
		</div>
		<div class="col-xs-12"><button type="button" class="form__showComment">Добавить комментарий</button>
			<fieldset class="form__block jsSlideDown">
				<textarea rows="4" id="formComment" class="input jsFloating"></textarea>
				<label name="PROPERTY[67][0]" for="formComment" class="floatingLabel floatingLabel_big">Ваш комментарий</label>
			</fieldset>
		</div>
		<input type="hidden" name="iblock_submit" value="Y"/>
		<div class="col-xs-12">
			<fieldset class="form__block"><button class="button form__submit">Отправить заявку</button></fieldset>
		</div>
	</div>
</form>