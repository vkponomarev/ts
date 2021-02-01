<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByMonth common\components\calendar\CalendarByMonth
 * @var $dateData common\components\date\DateData
 * @var $countriesData common\components\countries\CountriesData
 * @var $holidaysData common\components\holidays\HolidaysByCountryByYear array
 * @var $holidaysTypesData common\components\holidaysTypes\HolidaysTypesData
 * @var $countryData common\components\country\CountryData
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths
 * @var $calendarNameOfDaysInWeek common\components\calendar\CalendarNameOfDaysInWeek
 * @var $PDFCalendarsData common\components\PDFCalendars\PDFCalendarsYearlyExists
 * @var $getParamsByCalendarYears common\components\getParams\GetParamsByCalendarYears
 * @var $holidaysRange common\components\holidays\HolidaysRange
 * @var $countryURL array ['url','id','defaultID']
 *
 *
 */

$moon = new \common\components\moon\Moon();
?>


<a name="calendar-<?= $dateData['year']['current'] ?>"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row">
    <?php /***************************** */ ?>
    <?php /***************************** Сегодняшний месяц*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 current-date">
        <div class="current-date-div">
            <div class="current-date-one">
                <div class="current-date-year">
                    <?= $calendarNameOfMonths[$dateData['month']['numberSimple']] ?>

                    <br>
                    <span class="current-date-month">
                    <?= $dateData['year']['current'] ?>&nbsp;<?= Yii::t('app', 'year'); ?>
                </span>

                </div>
            </div>
            <div class="current-date-text">

                <?= Yii::$app->params['text']['text1'] ?>
            </div>
        </div>
    </div>
    <?php /***************************** */ ?>
    <?php /***************************** Выберите страну*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 c-links-mp">


        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/tomato/">
                    <?= Yii::t('app', 'Tomato') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/cucumber/">
                    <?= Yii::t('app', 'Cucumber') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/pepper/">
                    <?= Yii::t('app', 'Pepper') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/onions-on-greens/">
                    <?= Yii::t('app', 'Onions on greens') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/cabbage/">
                    <?= Yii::t('app', 'Cabbage') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/asparagus/">
                    <?= Yii::t('app', 'Asparagus') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/eggplant/">
                    <?= Yii::t('app', 'Eggplant') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/zucchini/">
                    <?= Yii::t('app', 'Zucchini') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/squash/">
                    <?= Yii::t('app', 'Squash') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/pumpkin/">
                    <?= Yii::t('app', 'Pumpkin') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/radish/">
                    <?= Yii::t('app', 'Radish') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/daikon/">
                    <?= Yii::t('app', 'Daikon') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/greens/">
                    <?= Yii::t('app', 'Greens') ?>
                </a>
                <br>


            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/potatoes/">
                    <?= Yii::t('app', 'Potato') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/jerusalem-artichoke/">
                    <?= Yii::t('app', 'Jerusalem artichoke') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/strawberries/">
                    <?= Yii::t('app', 'Strawberries') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/peas/">
                    <?= Yii::t('app', 'Peas') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/beans/">
                    <?= Yii::t('app', 'Beans') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/carrot/">
                    <?= Yii::t('app', 'Carrot') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/beet/">
                    <?= Yii::t('app', 'Beet') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/turnip/">
                    <?= Yii::t('app', 'Turnip') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/celery/">
                    <?= Yii::t('app', 'Celery') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/melons/">
                    <?= Yii::t('app', 'Melons') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/unfavorable/">
                    <?= Yii::t('app', 'Unfavorable days') ?>
                </a>
                <br>

            </div>
        </div>
        <div class="c-links-block">
            <hr class="hr-1">
        </div>


    </div>
</div>
<br><br>
<hr>

<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с месяцами туда сюда*/ ?>
<?php /***************************** */ ?>


<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($dateData['year']['previous'] == '0000' && $dateData['month']['numberSimple'] == 1): ?>

        <?php else: ?>
            <?php if ($dateData['month']['numberSimple'] == 1): ?>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['previous'] ?>-<?= str_pad(12, 2, '0', STR_PAD_LEFT) ?>/
            <?= ($gardenerName <> '') ? $gardenerName . '/' : '' ?>">
                    <?= $calendarNameOfMonths[12] ?>
                </a>
            <?php else: ?>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= str_pad($dateData['month']['numberSimple'] - 1, 2, '0', STR_PAD_LEFT) ?>/
            <?= ($gardenerName <> '') ? $gardenerName . '/' : '' ?>">
                    <?= $calendarNameOfMonths[$dateData['month']['numberSimple'] - 1] ?>
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">
        <?= $calendarNameOfMonths[$dateData['month']['numberSimple']] ?>
    </div>

    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($dateData['year']['current'] == '9999' && $dateData['month']['numberSimple'] == 12): ?>

        <?php else: ?>
            <?php if ($dateData['month']['numberSimple'] == 12): ?>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['next'] ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/
            <?= ($gardenerName <> '') ? $gardenerName . '/' : '' ?>">
                    <?= $calendarNameOfMonths[1] ?>
                </a>
            <?php else: ?>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= str_pad($dateData['month']['numberSimple'] + 1, 2, '0', STR_PAD_LEFT) ?>/
            <?= ($gardenerName <> '') ? $gardenerName . '/' : '' ?>">
                    <?= $calendarNameOfMonths[$dateData['month']['numberSimple'] + 1] ?>
                </a>
            <?php endif; ?>
        <?php endif; ?>


    </div>
</div>
<hr>
<?php if ($PDFCalendarsData['exists']): ?>
    <div class="row">
        <div class="col-xxs-12 c-prev-next-right">
            <a href="#download-calendar-<?= $dateData['year']['current'] ?>" class="btn btn-default">
                <span class="fa fa-print fa-lg"></span>&nbsp;<?= Yii::t('app', 'Print'); ?>
            </a>
        </div>
    </div>
    <br>
<?php endif; ?>
<?php /***************************** */ ?>
<?php /***************************** Календарь с отмеченными праздниками конкретнрой страны*/ ?>
<?php /***************************** */ ?>


<div class="row rflex myear">
    <?php
    $countMonths = $dateData['month']['numberSimple'] - 1;
    $countWeeks = 0;
    //(new \common\components\dump\Dump())->printR($calendarByMonth);die;



    foreach ($calendarByMonth['calendar'] as $key => $months) :?>

        <?php $countMonths++; ?>
        <div class="mmonth col-xxs-12">
            <div class="mmonth-name">

                <?= $calendarNameOfMonths[$countMonths]; ?>

            </div>

            <div class="mweek-name">
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <div class="mday-name">
                        <?= $calendarNameOfDaysInWeek[$i]; ?>
                    </div>
                <?php endfor; ?>
            </div>


            <?php foreach ($months as $week): ?>
                <div class="mweek">
                    <?php for ($i = 1; $i <= 5; $i++): ?>

                        <?php if (isset($week[$i]['monthDay'])): ?>


                            <div class="mday
                            <?= (isset($gardenerNames[$gardenerName][(int)$key][$calendarByMonth['moonDay'][$week[$i]['date']]])) ? ' md-one' : '' ?>
                            <?= (isset($gardenerNames['unfavorable'][(int)$key][$calendarByMonth['moonDay'][$week[$i]['date']]])) ? ' md-five' : '' ?>
                            ">
                                    <span>
                                   <?= $week[$i]['monthDay']; ?><br>
                                         <img width="18"
                                              src="/pictures/moon-phases/<?= $moon->pictures($week[$i], $calendarByMonth['moonPhases']) ?>"><br>
                                    <?= $calendarByMonth['moonDay'][$week[$i]['date']]; ?>

                                    </span>
                            </div>

                        <?php else: ?>
                            <div class="mno-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php for ($i = 6; $i <= 7; $i++): ?>
                        <?php if (isset($week[$i]['monthDay'])): ?>

                            <div class="mday-off
                            <?= (isset($gardenerNames[$gardenerName][(int)$key][$calendarByMonth['moonDay'][$week[$i]['date']]])) ? ' md-one' : '' ?>
                            <?= (isset($gardenerNames['unfavorable'][(int)$key][$calendarByMonth['moonDay'][$week[$i]['date']]])) ? ' md-five' : '' ?>
                            ">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?><br>
                                         <img width="18"
                                              src="/pictures/moon-phases/<?= $moon->pictures($week[$i], $calendarByMonth['moonPhases']) ?>"><br>
                                    <?= $calendarByMonth['moonDay'][$week[$i]['date']]; ?>

                                    </span>
                            </div>

                        <?php else: ?>
                            <div class="mno-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

</div>
<br>
<br>

<div class="legend-center">

    <div class="md-one md-legend-color">
        &nbsp;
    </div>
    <div class="md-legend-text">
        <?= Yii::t('app', 'Auspicious days') ?>
    </div>

    <div class="md-five md-legend-color">
        &nbsp;
    </div>
    <div class="md-legend-text">
        <?= Yii::t('app', 'Unfavorable days') ?>
    </div>

</div>
<hr>
<br>




<?php /***************************** */ ?>
<?php /***************************** Ссылки на PDF календари*/ ?>
<?php /***************************** */ ?>

<?php if ($PDFCalendarsData['exists']): ?>
    <br>

    <a name="download-calendar-<?= $dateData['year']['current'] ?>"></a>
    <h2 class="main-page-h1">
        <?= Yii::t('app', 'Download and print PDF lunar calendar (moon phases) for {month} {year}', [
            'year' => $dateData['year']['current'],
            'month' => $calendarNameOfMonths[$dateData['month']['numberSimple']],
        ]) ?>
    </h2>

    <br><br>

    <div class="row rflex">
        <?php foreach ($PDFCalendarsData['pdf'] as $key => $pdf): ?>
            <?php if ($pdf['pdfExists']): ?>
                <div class="col-xxs-12 col-xs-6 col-md-4 col-lg-3 d-center pdf-download">
                    <?php if ($key == 'moonPNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Portrait lunar calendar for the year') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'moonLNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Landscape lunar calendar for the year') ?></div>
                    <?php endif; ?>

                    <a href="<?= $pdf['imgPathRelative'] ?>" class="lightzoom">
                        <img class="c-download-img " alt="" src="<?= $pdf['imgPathRelative'] ?>" width="100%">
                    </a>

                    <a href="<?= $pdf['pdfPathRelative'] ?>" download class="btn btn-success c-download-button"
                       target="_blank">
                        <?= Yii::t('app', 'Download') ?>
                    </a>
                    <br>
                    <a href="<?= $pdf['pdfPathRelative'] ?>" class="btn btn-success c-download-button" target="_blank">
                        <?= Yii::t('app', 'Print') ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php else: ?>
<?php endif; ?>


