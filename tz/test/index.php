<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<!--BoltovIgnat start-->
<?$APPLICATION->IncludeComponent(
	"boltovignat:list", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"ID" => "1",
		"Nomber-Page" => "5",
		"Count" => "1",
		"Sort" => "SORT",
		"Filtr" => "5"
	),
	null
);?>
<!--BoltovIgnat end-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>