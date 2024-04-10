<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?=$arResult["FORM_NOTE"]?>
<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>
<div class="contact-form">
	<?
	if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y") {?>

		<div class="contact-form__head">
			<? if ($arResult["isFormTitle"]) {?>
				<div class="contact-form__head-title"><?=$arResult["FORM_TITLE"]?></div>
			<?} //endif ;

			if ($arResult["isFormImage"] == "Y") {?>
			<a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>"><img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?><?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" /></a>
			<?//=$arResult["FORM_IMAGE"]["HTML_CODE"]?>
			<?} //endif?>
				<div class="contact-form__head-text"><?=$arResult["FORM_DESCRIPTION"]?></div>
		</div>
	<?} // endif?>

<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>	

<div class="contact-form__form">
	<div class="contact-form__form-inputs">	
	<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {

		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
			echo $arQuestion["HTML_CODE"];
		} else {?>
		<div class="input contact-form__input">

				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
				<?endif;?>
				<div class="input__label-text">
					<?=$arQuestion["CAPTION"]?>
					<?if ($arQuestion["REQUIRED"] == "Y"):?><?='*';?><?endif;?></div>

				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>

                <div><?=$arQuestion["HTML_CODE"]?></div>
		</div>
		<?}
	} //endforeach?>
	</div>
	<div class="contact-form__bottom">
        <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
            ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
            данных&raquo;.
        </div>
        <button class="form-button contact-form__bottom-button"  type="submit" name="web_form_apply" value="Применить">
            <div class="form-button__title">Отправить</div>
        </button>
    </div>
</div>

<p>
<?='*';?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)