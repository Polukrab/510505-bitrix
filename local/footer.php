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
  Array(
    "ALLOW_MULTI_SELECT" => "N",  // Разрешить несколько активных пунктов одновременно
    "CHILD_MENU_TYPE" => "left",  // Тип меню для остальных уровней
    "DELAY" => "N", // Откладывать выполнение шаблона меню
    "MAX_LEVEL" => "1", // Уровень вложенности меню
    "MENU_CACHE_GET_VARS" => array( // Значимые переменные запроса
      0 => "",
    ),
    "MENU_CACHE_TIME" => "3600",  // Время кеширования (сек.)
    "MENU_CACHE_TYPE" => "N", // Тип кеширования
    "MENU_CACHE_USE_GROUPS" => "N", // Учитывать права доступа
    "ROOT_MENU_TYPE" => "top",  // Тип меню для первого уровня
    "USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
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