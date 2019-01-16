<?
global $APPLICATION;

$aMenuLinkExt = $APPLICATION->IncludeComponent(
  "bitrix:menu.sections",
  "",
  array(
    "IS_SEF" => "Y",
    "SEF_BASE_URL" => "",
    "SECTUION_PAGE_URL" => "#SECTION_ID#/",
    "DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#",
    "IBLOCK_ID" => "5",
    "IBLOCK_TYPE" => "products",
    "DEPTH_LEVEL" => "1",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600000"
    ),
  false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);