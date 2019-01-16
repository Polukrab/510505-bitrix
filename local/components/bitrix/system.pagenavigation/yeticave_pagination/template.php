<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

//dump($arResult, true, true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>
<!-- <div class="modern-page-navigation"> -->
<ul class="pagination-list">
<?

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
	
<?
	$bFirst = true;
	?>
	<li class="pagination-item pagination-item-prev">
	<?
	// if ($arResult["NavPageNomer"] > 1):
		if($arResult["bSavePage"]):
?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_prev")?></a>
<?
		else:
			if ($arResult["NavPageNomer"] > 2):
?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_prev")?></a>
<?
			elseif ($arResult["NavPageNomer"] == 2):
?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=GetMessage("nav_prev")?></a>
<?			
			else:
?>						
			<a><?=GetMessage("nav_prev")?></a>
<?
			endif;
		
		endif;
	?>
	</li>
	<?
		
		if ($arResult["nStartPage"] > 1):
		?>
			<li class="pagination-item">
		<?
			$bFirst = false;
			if($arResult["bSavePage"]):
?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
<?
			else:
?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
<?
			endif;
		?>
			</li>
		<?
			if ($arResult["nStartPage"] > 2):
?>
			<li class="pagination-item">
			<!-- <span class="modern-page-dots">...</span> -->
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">...</a>
			</li>
<?
			endif;
		endif;
	// endif;

	do
	{
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>		
	<li class="pagination-item pagination-item-active">
		<a><?=$arResult["nStartPage"]?></a>
	</li>
<?
		elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
?>
	<li class="pagination-item">
		<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "modern-page-first" : "")?>"><?=$arResult["nStartPage"]?></a>
	</li>
<?
		else:
?>
	<li class="pagination-item">
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
	</li>
<?
		endif;
		$arResult["nStartPage"]++;
		$bFirst = false;
	} while($arResult["nStartPage"] <= $arResult["nEndPage"]);
	
	// if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
			if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
/*?>
		<span class="modern-page-dots">...</span>
<?*/
?>
	<li class="pagination-item">
		<a class="modern-page-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>">...</a>
	</li>
<?
			endif;
?>
	<li class="pagination-item">
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
	</li>
<?
		endif;
	if ($arResult['NavPageNomer'] < $arResult['NavPageCount']):
?>
	<li class="pagination-item pagination-item-next">
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_next")?></a>
	</li>
<?
	else:
?>
	<li class="pagination-item pagination-item-next">
		<a><?=GetMessage("nav_next")?></a>
	</li>
<?
	endif;
?>
</ul>
