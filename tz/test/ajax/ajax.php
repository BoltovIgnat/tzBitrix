<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule("iblock");
    $el = new CIBlockElement;
    $arLoadProductArray = Array(
        "NAME" => html_entity_decode($_POST[name]),
        "PREVIEW_TEXT" => html_entity_decode($_POST[description]), 
    );
    $res = $el->Update($_POST[id], $arLoadProductArray);

    CIBlock::clearIBlockTagCache(1);
    print_r($_POST);
?>