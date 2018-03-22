<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
use Bitrix\Main\Application; 
$request = Application::getInstance()->getContext()->getRequest(); 

$idPage = htmlspecialchars($request->getQuery("PAGEN_1"));
print_r();
if(empty($idPage)) $idPage = 1; 
?>
	<h1 class="title_news">Блог: новости</h1>

	<div >
		<?
			//Количество на странице
			$countOnPage = 1;
			// Исходный массив данных для списка
			$elements = $arResult['ITEMS'];
			
			// Получаем номер текущей страницы из реквеста
			$page = intval($idPage);
			// Отбираем элементы текущей страницы
			$elementsPage = array_slice($elements, ($page * $countOnPage)-1, $countOnPage);?>
			<?foreach($elementsPage as $arItem):?>
				<?print_r();?>
				<div class="news">
					<h4><?=$arItem[Fields][NAME]?></h4>
					<p><?=$arItem[Fields][PREVIEW_TEXT]?></p>
					<a href="/test/edit?id=<?=$arItem[Fields][ID]?>">Редактировать</a>
				</div>
				
			<?endforeach;?>
			<?$navResult = new CDBResult();
			$navResult->NavPageCount = ceil(count($elements) / $countOnPage);
			$navResult->NavPageNomer = $page;
			$navResult->NavNum = 1;
			$navResult->NavPageSize = $countOnPage;
			$navResult->NavRecordCount = count($elements);
			// Вывод пагинатора
			$APPLICATION->IncludeComponent('bitrix:system.pagenavigation', '', array(
				'NAV_RESULT' => $navResult,
			));
		?>
		

		
		
	</div>