<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

/** @global CIntranetToolbar $INTRANET_TOOLBAR */
global $INTRANET_TOOLBAR;

use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock;

$item = array();
CModule::IncludeModule("iblock");
CModule::IncludeMOdule("catalog");
CModule::IncludeModule('highloadblock');

//Кэширование Компонента
//Создаем объект кеша
$obCache = new CPHPCache;

//Определяем время на которое кешируем данные в сек.
$life_time = 3600000;

//Определяем ID кеша, ID это уникальное значение по которому отличаются кеши, может быть так же массивом
$cache_id = "cache_id";

if($obCache->StartDataCache($life_time, $cache_id, "/cache_dir")) {
	
	$arSelect = Array();
	$arFilter = Array("IBLOCK_ID"=>IntVal($arParams[ID]), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$arOrder  = Array($arParams[Sort]=>"ASC");

	//$arResult['countNewsOnPage'] = $arParams[Count];
	//$arResult['startPage'] = 1;

	$res = CIBlockElement::GetList($arOrder, $arFilter, false, Array(), $arSelect);
	while($ob = $res->GetNextElement()){ 
		$arFields = $ob->GetFields(); 
		$arResult['ITEMS'][$arFields[ID]]['Fields'] = $arFields;
		
		$arProps = $ob->GetProperties();
		$arResult['ITEMS'][$arFields[ID]]['Props'] = $arProps;
		 	
	}

	$obCache->EndDataCache(array(
		"arResult" => $arResult
	));
} else {
	// Если у нас был кеш до достаем закешированные переменные
	$res = $obCache->GetVars();
	$arResult = $res["arResult"];
}

$this->includeComponentTemplate();



