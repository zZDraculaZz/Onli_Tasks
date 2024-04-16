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

<div class="contact-form__form">
	<div class="contact-form__form-inputs">	
		           <div class="input contact-form__input"><label class="input__label" for="medicine_name">
                <div class="input__label-text">Ваше имя*</div>
                <input class="input__input" type="text" 
                id="form_<?=
                $arResult["QUESTIONS"]['medicine_name']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_name']['STRUCTURE'][0]['ID'];?>" 
                name="form_<?=
                $arResult["QUESTIONS"]['medicine_name']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_name']['STRUCTURE'][0]['ID'];?>" " value=""
                       required="">
                <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
            </label></div>
            <div class="input contact-form__input"><label class="input__label" for="medicine_company">
                <div class="input__label-text">Компания/Должность*</div>
                <input class="input__input" type="text" id="form_<?=
                $arResult["QUESTIONS"]['medicine_company']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_company']['STRUCTURE'][0]['ID'];?>" name="form_<?=
                $arResult["QUESTIONS"]['medicine_company']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_company']['STRUCTURE'][0]['ID'];?>" value=""
                       required="">
                <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
            </label></div>
            <div class="input contact-form__input"><label class="input__label" for="medicine_email">
                <div class="input__label-text">Email*</div>
                <input class="input__input" type="email" id="form_<?=
                $arResult["QUESTIONS"]['medicine_email']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_email']['STRUCTURE'][0]['ID'];?>" name="form_<?=
                $arResult["QUESTIONS"]['medicine_email']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_email']['STRUCTURE'][0]['ID'];?>" value=""
                       required="">
                <div class="input__notification">Неверный формат почты</div>
            </label></div>
            <div class="input contact-form__input"><label class="input__label" for="medicine_phone">
                <div class="input__label-text">Номер телефона*</div>
                <input class="input__input" type="tel" id="form_<?=
                $arResult["QUESTIONS"]['medicine_phone']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_phone']['STRUCTURE'][0]['ID'];?>"
                       data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'" maxlength="12"
                       x-autocompletetype="phone-full" name="form_<?=
                $arResult["QUESTIONS"]['medicine_phone']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_phone']['STRUCTURE'][0]['ID'];?>" value="" required=""></label></div>
        </div>
        <div class="contact-form__form-message">
            <div class="input"><label class="input__label" for="medicine_message">
                <div class="input__label-text">Сообщение</div>
                <textarea class="input__input" type="text" id="form_<?=
                $arResult["QUESTIONS"]['medicine_message']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_message']['STRUCTURE'][0]['ID'];?>" name="form_<?=
                $arResult["QUESTIONS"]['medicine_message']['STRUCTURE'][0]['FIELD_TYPE'].
                '_'.
                $arResult["QUESTIONS"]['medicine_message']['STRUCTURE'][0]['ID'];?>"
                          value=""></textarea>
                <div class="input__notification"></div>
            </label></div>
        </div>
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
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)