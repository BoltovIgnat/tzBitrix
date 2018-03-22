<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Редактирование");
CModule::IncludeModule("iblock");?>

<?
use Bitrix\Main\Application; 
$request = Application::getInstance()->getContext()->getRequest(); 
$APPLICATION->AddHeadScript('/test/edit/scriptIB.js');
$id = htmlspecialchars($request->getQuery("id"));

$res = CIBlockElement::GetByID($id);
$ar_res = $res->GetNext();   

?>


 <form class="updateNewsForm" id="<?=$id?>" action="">
 <p><b>Редактирование названия:</b></p>
  <p><input type="text" size="40" value="<?=$ar_res['NAME']?>"></p>
  <p><b>Редактирование новостей:</b></p>
  <p><textarea name="comment" ><?=$ar_res['PREVIEW_TEXT']?></textarea></p>
  <p><input type="submit"></p>
 
 </form>
 <a href="/test">вернуться к списку</a>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>