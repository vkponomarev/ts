<?php

/**
 * @var $this frontend\controllers\MainPageController
 * @var $modal frontend\controllers\YoutubeController
 * @var $search frontend\controllers\SearchController
 *
 * @var $yearData common\components\year\YearData
 * @var $calendarByYear common\components\calendar\CalendarByYear
 */


if (isset($getParamsCustomize['header']))
    $header = $getParamsCustomize['header'];
else
    $header = '';
/*
 *
 * <img src="/customize/customize.jpg" width="100%">*/

?>

<a name="calendar-<?= $yearData['current'] ?>"></a><h1
        class="main-page-h1"><?= Yii::t('app', 'Кастомизировать календарь') ?></h1>
<br><br>


<script>
    function submitType(element, id) {
        $(element).val(id);
        $("#form").submit();
    }
</script>
<div>

    <div class="col-xs-6">
        <form method="get" id="form">
            <div class="form-group">
                <label for="usr">Заголовок:</label>
                <input type="text" class="form-control" id="header" name="header" value="<?= $header ?>">
            </div>

            <div class="form-group">
                <label for="usr">Ориентация:</label><br>

                <?php if ($getParamsCustomize['orientation']=='P'): ?>
                    <input type="hidden" id="orientation" name="orientation" value="P">
                    <input type="button" class="btn btn-success" value="Портрет">
                    <input type="button" onClick="submitType('#orientation', 'L')" class="btn btn-default" value="Пейзаж">
                <?php else: ?>
                    <input type="hidden" id="orientation" name="orientation" value="L">
                    <input type="button" onClick="submitType('#orientation', 'P')" class="btn btn-default" value="Портрет">
                    <input type="button" class="btn btn-success" value="Пейзаж">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="usr">Тип календаря:</label><br>

                <?php if ($getParamsCustomize['type']==1): ?>
                    <input type="hidden" id="type" name="type" value="1">
                    <input type="button" class="btn btn-success" value="На год">
                <?php else: ?>
                    <input type="button" onClick="submitType('#type', 1)" class="btn btn-default" value="На год">
                <?php endif; ?>

                <?php if ($getParamsCustomize['type']==2): ?>
                    <input type="hidden" id="type" name="type" value="2">
                    <input type="button" class="btn btn-success" value="На месяц">
                <?php else: ?>
                    <input type="button" onClick="submitType('#type', 2)" class="btn btn-default" value="На месяц">
                <?php endif; ?>

                <?php if ($getParamsCustomize['type']==3): ?>
                    <input type="hidden" id="type" name="type" value="3">
                    <input type="button" class="btn btn-success" value="На 2 месяца">
                <?php else: ?>
                    <input type="button" onClick="submitType('#type', 3)" class="btn btn-default" value="На 2 месяца">
                <?php endif; ?>

                <?php if ($getParamsCustomize['type']==4): ?>
                    <input type="hidden" id="type" name="type" value="4">
                    <input type="button" class="btn btn-success" value="На неделю">
                <?php else: ?>
                    <input type="button" onClick="submitType('#type', 4)" class="btn btn-default" value="На неделю">
                <?php endif; ?>

                <?php if ($getParamsCustomize['type']==5): ?>
                    <input type="hidden" id="type" name="type" value="5">
                    <input type="button" class="btn btn-success" value="На день">
                <?php else: ?>
                    <input type="button" onClick="submitType('#type', 5)" class="btn btn-default" value="На день">
                <?php endif; ?>

            </div>

            <div class="form-group">
                <label for="usr">Год:</label><br>
                <button type="button" class="btn btn-default">2018</button>
                <button type="button" class="btn btn-default">2019</button>
                <button type="button" class="btn btn-default">2020</button>
                <button type="button" class="btn btn-default">2021</button>
                <button type="button" class="btn btn-default">2021</button>
            </div>

            <div class="form-group">
                <label for="usr">Язык календаря:</label><br>
                <select class="form-control">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="form-group">
                <label for="usr">Страна:</label><br>
                <select class="form-control">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>


            <div class="form-group">
                <label for="usr">Размер:</label><br>
                <button type="button" class="btn btn-default">Letter</button>
                <button type="button" class="btn btn-default">11*17</button>
                <button type="button" class="btn btn-default">Legal</button>
                <button type="button" class="btn btn-default">Poster</button>
            </div>

            <div class="form-group">
                <label for="usr">Конец недели:</label><br>
                <button type="button" class="btn btn-default">Затемнен</button>
                <button type="button" class="btn btn-default">Не затемнен</button>
            </div>


            <div class="form-group">
                <label for="usr">Неделя начинается с:</label><br>
                <button type="button" class="btn btn-default">Понедельник</button>
                <button type="button" class="btn btn-default">Воскресенье</button>
            </div>

            <div class="form-group">
                <label for="usr">Начальный месяц:</label><br>
                <select class="form-control">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>


        </form>
    </div>
    <div class="col-xs-6">
        <div class="calendar-preview">
            <img src="/customize/customize.jpg" width="100%">
        </div>


    </div>


</div>


<hr>
<script>
    <!--
    function btnClick() {
        function form() {
            document.forms["form"].submit();
        }
    }

    //-->
</script>