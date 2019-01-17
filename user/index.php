<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

global $USER;
if ($USER->IsAuthorized())
{
	LocalRedirect("/");
}

$APPLICATION->SetTitle("Вход на сайт");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"yeticave", 
	array(
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "",
		"REGISTER_URL" => "/user/sign-up.php",
		"SHOW_ERRORS" => "Y",
		"COMPONENT_TEMPLATE" => "yeticave"
	),
	false
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>