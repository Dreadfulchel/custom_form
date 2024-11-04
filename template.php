<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Форма обратной связи</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= $templateFolder ?>/images/favicon.604825ed.ico" type="image/x-icon">
    <link href="<?= $templateFolder ?>/css/common.css" rel="stylesheet">
</head>
<body>
<div class="contact-form">
    <div class="contact-form__head">
        <div class="contact-form__head-title">Связаться</div>
        <div class="contact-form__head-text">Наши сотрудники помогут выполнить подбор услуги и расчет цены с учетом ваших требований</div>
    </div>

    <form class="contact-form__form" action="<?= POST_FORM_ACTION_URI ?>" method="POST">
        <?= bitrix_sessid_post() ?>
        
        <div class="contact-form__form-inputs">
            <?php foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
                <?php if ($FIELD_SID != "MESSAGE"): ?>
                    <div class="input contact-form__input">
                        <label class="input__label" for="<?= $arQuestion["STRUCTURE"][0]["ID"] ?>">
                            <div class="input__label-text"><?= $arQuestion["CAPTION"] ?><?= $arQuestion["REQUIRED"] == "Y" ? "*" : "" ?></div>
                            <?= $arQuestion["HTML_CODE"] ?>
                            <?php if ($FIELD_SID == "EMAIL"): ?>
                                <div class="input__notification">Неверный формат почты</div>
                            <?php else: ?>
                                <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
                            <?php endif; ?>
                        </label>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="contact-form__form-message">
            <div class="input">
                <label class="input__label" for="<?= $arResult["QUESTIONS"]["MESSAGE"]["STRUCTURE"][0]["ID"] ?>">
                    <div class="input__label-text"><?= $arResult["QUESTIONS"]["MESSAGE"]["CAPTION"] ?></div>
                    <?= $arResult["QUESTIONS"]["MESSAGE"]["HTML_CODE"] ?>
                    <div class="input__notification"></div>
                </label>
            </div>
        </div>

        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">
                Нажимая &laquo;Отправить&raquo;, Вы подтверждаете, что ознакомлены, полностью согласны и принимаете условия &laquo;Согласия на обработку персональных данных&raquo;.
            </div>
            <button class="form-button contact-form__bottom-button" type="submit" name="web_form_submit" value="Y" data-success="Отправлено" data-error="Ошибка отправки">
                <div class="form-button__title">Оставить заявку</div>
            </button>
        </div>
    </form>
</div>
</body>
</html>