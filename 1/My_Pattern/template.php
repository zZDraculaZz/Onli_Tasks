<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
$this->setFrameMode(true);
?>
<div id="barba-wrapper">
    <div class="article-list">

        <?php if ($arParams["DISPLAY_TOP_PAGER"]):?>
            <?=$arResult["NAV_STRING"];?><br />
        <?php endif;?>
        <?php foreach ($arResult["ITEMS"] as $arItem):?>
            <?php
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <a width="100%" href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="article-item article-list__item" data-anim="anim-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <?php if ($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                    <div class="article-item__background"><img
                                src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>"
                                alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"];?>"
                        /></div>
                <?php endif;?>
                <div class="article-item__wrapper">
                    <?php if ($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                        <span class="news-date-time"><?= $arItem["DISPLAY_ACTIVE_FROM"];?></span>
                    <?php endif;?>
                    <?php if ($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                        <div class="article-item__title"><?= $arItem["NAME"];?></div>
                    <?php endif;?>
                    <?php if ($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                        <div class="article-item__content"><?= $arItem["PREVIEW_TEXT"];?></div>
                    <?php endif;?>
                    <?php foreach ($arItem["FIELDS"] as $code=>$value):?>
                        <small>
                            <?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
                        </small><br />
                    <?php endforeach;?>
                    <?php foreach ($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                        <small>
                            <?=$arProperty["NAME"];?>:&nbsp;
                            <?php if(is_array($arProperty["DISPLAY_VALUE"])):?>
                                <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
                            <?php else:?>
                                <?=$arProperty["DISPLAY_VALUE"];?>
                            <?php endif;?>
                        </small><br />
                    <?php endforeach;?>
                </div>
            </a>
        <?php endforeach;?>
        <?php if ($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <br /><?=$arResult["NAV_STRING"];?>
        <?php endif;?>
    </div>
</div>
