<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
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
 */


$moon = new \common\components\moon\Moon();

?>


<a name="calendar-<?= $dateData['year']['current'] ?>"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row">
    <?php /***************************** */ ?>
    <?php /***************************** Сегодняшний год*/ ?>
    <?php /***************************** */ ?>
    <div class="col-xxs-12 col-xs-6 current-date">
        <div class="current-date-div">
            <div class="current-date-one">
                <div class="current-date-year">
                    <?= $dateData['year']['current'] ?>
                    <br>
                    <span class="current-date-month">
                    <?= Yii::t('app', 'year'); ?>
                </span>

                </div>
            </div>
            <div class="current-date-text">

                <?= Yii::$app->params['text']['text1'] ?>
            </div>
        </div>
    </div>

    <?php /***************************** */ ?>
    <?php /***************************** Ссылки на различеные направления благоприятных дней*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 c-links-mp">

        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/tomato/">
                    <?= Yii::t('app', 'Tomato') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/cucumber/">
                    <?= Yii::t('app', 'Cucumber') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/pepper/">
                    <?= Yii::t('app', 'Pepper') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/onions-on-greens/">
                    <?= Yii::t('app', 'Onions on greens') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/cabbage/">
                    <?= Yii::t('app', 'Cabbage') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/asparagus/">
                    <?= Yii::t('app', 'Asparagus') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/eggplant/">
                    <?= Yii::t('app', 'Eggplant') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/zucchini/">
                    <?= Yii::t('app', 'Zucchini') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/squash/">
                    <?= Yii::t('app', 'Squash') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/pumpkin/">
                    <?= Yii::t('app', 'Pumpkin') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/radish/">
                    <?= Yii::t('app', 'Radish') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/daikon/">
                    <?= Yii::t('app', 'Daikon') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/greens/">
                    <?= Yii::t('app', 'Greens') ?>
                </a>
                <br>


            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/potatoes/">
                    <?= Yii::t('app', 'Potato') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/jerusalem-artichoke/">
                    <?= Yii::t('app', 'Jerusalem artichoke') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/strawberries/">
                    <?= Yii::t('app', 'Strawberries') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/peas/">
                    <?= Yii::t('app', 'Peas') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/beans/">
                    <?= Yii::t('app', 'Beans') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/carrot/">
                    <?= Yii::t('app', 'Carrot') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/beet/">
                    <?= Yii::t('app', 'Beet') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/turnip/">
                    <?= Yii::t('app', 'Turnip') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/celery/">
                    <?= Yii::t('app', 'Celery') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/melons/">
                    <?= Yii::t('app', 'Melons') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['current'] ?>/unfavorable/">
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
<?php /***************************** Верхняя плашка календаря с годами туда сюда*/ ?>
<?php /***************************** */ ?>

<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($dateData['year']['previous'] == '0100'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['previous'] ?>/
            <?= ($gardenerName <> '') ? $gardenerName . '/' : '' ?>">
                <?= $dateData['year']['previous'] ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">

        <?= $dateData['year']['current'] ?>

    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($dateData['year']['current'] == '9998'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/years/<?= $dateData['year']['next'] ?>/
            <?= ($gardenerName <> '') ? $gardenerName . '/' : '' ?>">
                <?= $dateData['year']['next'] ?>
            </a>
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
<?php /***************************** Лунный календарь*/ ?>
<?php /***************************** */ ?>

<div class="row rflex year">
    <?php
    $countMonths = 0;
    $countWeeks = 0;
    $countMoonDay = 0;
    //

    //(new \common\components\dump\Dump())->printR($gardenerNames['tomato']);die;


    //(new \common\components\dump\Dump())->printR($calendarByYear['moonPhases']['moonThirdQuarter']);
    //number_format($week[$i]['moonPhase']['phase'], 2, '.', ' ');
    foreach ($calendarByYear['calendar'] as $key => $months) :?>
        <?php $countMonths++; ?>
        <div class="month col-xxs-12 col-xs-6 col-sm-4 col-md-3">
            <div class="month-name">
            <span class="fa fa-calendar">
                </span>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/gardener/months/<?= $dateData['year']['current'] ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
                    <?= $calendarNameOfMonths[$countMonths]; ?>
                </a>

            </div>

            <div class="week-name">
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <div class="day-name">
                        <?= $calendarNameOfDaysInWeek[$i]; ?>
                    </div>
                <?php endfor; ?>
            </div>


            <?php foreach ($months as $week): ?>
                <?php $countWeeks++; ?>

                <div class="week">
                    <?php for ($i = 1; $i <= 5; $i++): ?>

                        <?php if (isset($week[$i]['monthDay'])): ?>


                            <div class="day
                            <?= (isset($gardenerNames[$gardenerName][(int)$key][$calendarByYear['moonDay'][$week[$i]['date']]])) ? ' md-one' : '' ?>
                            <?= (isset($gardenerNames['unfavorable'][(int)$key][$calendarByYear['moonDay'][$week[$i]['date']]])) ? ' md-five' : '' ?>
                                    ">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?><br>
                                         <img width="18"
                                              src="/pictures/moon-phases/<?= $moon->pictures($week[$i], $calendarByYear['moonPhases']) ?>"><br>
                                    <?= $calendarByYear['moonDay'][$week[$i]['date']]; ?>

                                    </span>
                            </div>

                        <?php else: ?>
                            <div class="no-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php for ($i = 6; $i <= 7; $i++): ?>
                        <?php if (isset($week[$i]['monthDay'])): ?>

                            <div class="day-off
                            <?= (isset($gardenerNames[$gardenerName][(int)$key][$calendarByYear['moonDay'][$week[$i]['date']]])) ? ' md-one' : '' ?>
                            <?= (isset($gardenerNames['unfavorable'][(int)$key][$calendarByYear['moonDay'][$week[$i]['date']]])) ? ' md-five' : '' ?>
                                        ">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?><br>
                                         <img width="18"
                                              src="/pictures/moon-phases/<?= $moon->pictures($week[$i], $calendarByYear['moonPhases']) ?>"><br>
                                    <?= $calendarByYear['moonDay'][$week[$i]['date']]; ?>
                                    </span>
                            </div>
                        <?php else: ?>
                            <div class="no-day">
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
        <?= Yii::t('app', 'Download and print PDF lunar calendar (moon phases) for {year}', [
            'year' => $dateData['year']['current'],
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


