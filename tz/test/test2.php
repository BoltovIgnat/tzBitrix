<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule("iblock");
    $text ="В следующем году состоится выставка одежды - Salon De Fashion, которая обещает быть еще более расширенной и интересной.2";
    $el = new CIBlockElement;
    $arLoadProductArray = Array(
        "NAME" => html_entity_decode($name),
        "PREVIEW_TEXT" => html_entity_decode($text), 
    );
    $res = $el->Update(2, $arLoadProductArray);
?>