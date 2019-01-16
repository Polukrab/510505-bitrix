<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT']))
{
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
}
else
{
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showBottomPager = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
}
?>

<section class="lots">
  <div class="lots__header">
    <h2>Открытые лоты</h2>
  </div>
  <ul class="lots__list">
	<?//dump($arResult, true, true);
	if (!empty($arResult['ITEMS']))
	{
		$areaIds = array();

		foreach ($arResult['ITEMS'] as $lot)
		{
			$uniqueId = $lot['ID'].'_'.md5($this->randString().$component->getAction());
			$areaIds[$lot['ID']] = $this->GetEditAreaId($uniqueId);
			$this->AddEditAction($uniqueId, $lot['EDIT_LINK'], $elementEdit);
			$this->AddDeleteAction($uniqueId, $lot['DELETE_LINK'], $elementDelete, $elementDeleteParams);
  ?>
      <li id="<?=$areaIds[$lot['ID']]?>" class="lots__item lot">
        <div class="lot__image">
          <img src="<?=$lot['DETAIL_PICTURE']['SAFE_SRC']?>" width="350" height="260" alt="<?=$lot['DETAIL_PICTURE']['ALT']?>">
        </div>
        <div class="lot__info">
          <span class="lot__category"><?=$lot['IBLOCK_SECTION_NAME']?></span>
          <h3 class="lot__title"><a class="text-link" href="<?=$lot['DETAIL_PAGE_URL']?>lot.html"><?=$lot['NAME']?></a></h3>
          <div class="lot__state">
            <div class="lot__rate">
              <span class="lot__amount"><?=$lot['PROPERTIES_VALUE']['PROPERTY_BETS_COUNT_VALUE'] ? "{$lot['PROPERTIES_VALUE']['PROPERTY_BETS_COUNT_VALUE']} Ставок" : "Стартовая цена"?></span>
              <span class="lot__cost"><?=$lot['PROPERTIES_VALUE']['PROPERTY_BETS_COUNT_VALUE'] ? $lot['PROPERTIES_VALUE']['PROPERTY_PRICE_CURRENT_VALUE'] : $lot['PROPERTIES_VALUE']['PROPERTY_PRICE_ORIGIN_VALUE'];?><b class="rub">р</b></span>
            </div>
            <div class="lot__timer timer <?=$lot['TIME_EXP_LEFT']['SECONDS'] > 3600 ? "" : "timer--finishing"?>">
              <?=$lot['TIME_EXP_LEFT']['STRING']?>
            </div>
          </div>
        </div>
      </li>
  <?}
  }?>
    </ul>
  </section>

<?if ($showBottomPager):?>
	<div data-pagination-num="<?=$navParams['NavNum']?>">
		<!-- pagination-container -->
		<?=$arResult['NAV_STRING']?>
		<!-- pagination-container -->
	</div>
<?endif;?>
