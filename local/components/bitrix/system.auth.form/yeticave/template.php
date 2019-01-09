<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<?if($arResult["FORM_TYPE"] == "login"):?>

<form name="system_auth_form<?=$arResult["RND"]?>" class="form container <?=($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']) ? "form--invalid" : ""; ?>" action="<?=$arResult["AUTH_URL"]?> target="_top" method="post"> <!-- form--invalid -->

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>

<?if($arResult["BACKURL"] <> ''):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
<?foreach ($arResult["POST"] as $key => $value):?>
	<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
<?endforeach?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />
      <h2>Вход</h2>
      <div class="form__item  <?=(!$_POST["USER_LOGIN"] && $arResult['ERROR']) ? "form__item--invalid" : ""; ?>"> <!-- form__item--invalid -->
        <label for="email"><?=GetMessage("AUTH_LOGIN")?>*</label>
        <input id="email" type="text" name="USER_LOGIN" maxlength="50" value="<?=$_POST["USER_LOGIN"] ? $_POST["USER_LOGIN"] : ""; ?>" placeholder="<?=GetMessage("AUTH_LOGIN_PLACEHOLDER")?>">
			<script>
				BX.ready(function() {
					var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
					if (loginCookie)
					{
						var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
						var loginInput = form.elements["USER_LOGIN"];
						loginInput.value = loginCookie;
					}
				});
			</script>
        <span class="form__error"><?=GetMessage("AUTH_LOGIN_PLACEHOLDER")?></span>
      </div>
      <div class="form__item form__item--last  <?=(!$_POST["USER_PASSWORD"] && $arResult['ERROR']) ? "form__item--invalid" : ""; ?>">
        <label for="password"><?=GetMessage("AUTH_PASSWORD")?>*</label>
        <input id="password" type="password" name="USER_PASSWORD" maxlength="50" placeholder="<?=GetMessage("AUTH_PASSWORD_PLACEHOLDER")?>" autocomplete="off">
        <span class="form__error"><?=GetMessage("AUTH_PASSWORD_ERROR")?></span>
      </div>
      <button type="submit" class="button"><?=GetMessage("AUTH_LOGIN_BUTTON")?></button>
    </form>
<?endif?>
