<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (file_exists($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/components/bitrix/catalog.section/yeticave_lots/functions.php")) {
	require_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/components/bitrix/catalog.section/yeticave_lots/functions.php");
}

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

//Получение списка категорий
$categoryObj = CIBlockSection::GetList(
    Array('SORT' => 'ASC'),
    Array('IBLOCK_ID' => $arResult['IBLOCK_ID']),
    false,
    Array(),
    false
);
while ($category = $categoryObj->GetNext()) {
	$categoryList[$category['ID']] = $category['NAME'];
}

//Получение свойств для лот элементов
$arFilters = array(
	'IBLOCK_ID' => $arResult['IBLOCK_ID'],
	'ID' => array_column($arResult['ITEMS'], 'ID')
);
$arPropObj = CIBlockElement::GetList(
 Array("ID"=>"ASC"),
 $arFilters,
 false,
 false,
 Array('PROPERTY_PRICE_ORIGIN', 'PROPERTY_PRICE_INCREMENT', 'PROPERTY_PRICE_CURRENT', 'PROPERTY_BETS_COUNT')
);
while ($properties = $arPropObj->GetNext()) {
	$arProperties[$properties['ID']] = $properties;
}

//Добавление данных к массиву arResult
if (!empty($arResult['ITEMS'])) {
	$ts_now = strtotime('now');
	foreach($arResult['ITEMS'] as $key => $lot) {
		$ts_active_to = MakeTimeStamp($lot['DATE_ACTIVE_TO'], CSite::GetDateFormat());
		$arResult['ITEMS'][$key]['TIME_EXP_LEFT'] = getTimeStringBeforExp($ts_now, $ts_active_to);
		$arResult['ITEMS'][$key]['IBLOCK_SECTION_NAME'] = $categoryList[$lot['IBLOCK_SECTION_ID']];
		$arResult['ITEMS'][$key]['PROPERTIES_VALUE'] = $arProperties[$lot['ID']];
	}
}
