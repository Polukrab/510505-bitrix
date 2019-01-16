<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

IncludeTemplateLangFile(__FILE__);
?>

  </main>
</div>

<footer class="main-footer">

<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"horizontal_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "horizontal_menu"
	),
	false
);?>

  <div class="main-footer__bottom container">
    <div class="main-footer__copyright">
    <?$APPLICATION->IncludeComponent(
      "bitrix:main.include",
      "",
      Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "PATH" => (SITE_TEMPLATE_PATH . "/include/copiright.php")
      )
    );?>
    </div>
    <div class="main-footer__social social">
      <span class="visually-hidden">Мы в соцсетях:</span>
      <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
          "AREA_FILE_SHOW" => "file",
          "AREA_FILE_SUFFIX" => "inc",
          "EDIT_TEMPLATE" => "",
          "PATH" => (SITE_TEMPLATE_PATH . "/include/social.php")
        )
      );?>
    </div>
    <?$APPLICATION->IncludeComponent(
      "bitrix:main.include",
      "",
      Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "PATH" => (SITE_TEMPLATE_PATH . "/include/add_new.php")
      )
    );?>
    <div class="main-footer__developed-by">
      <span class="visually-hidden">Разработано:</span>
      <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
          "AREA_FILE_SHOW" => "file",
          "AREA_FILE_SUFFIX" => "inc",
          "EDIT_TEMPLATE" => "",
          "PATH" => (SITE_TEMPLATE_PATH . "/include/logo.php")
        )
      );?>
    </div>
  </div>
</footer>

</body>
</html>