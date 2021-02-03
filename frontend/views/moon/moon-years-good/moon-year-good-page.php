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
                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/communication/">
                    <?= Yii::t('app', 'Communication') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/money/">
                    <?= Yii::t('app', 'Money') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/bosses/">
                    <?= Yii::t('app', 'Bosses') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/job-change/">
                    <?= Yii::t('app', 'Job change') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/property/">
                    <?= Yii::t('app', 'The property') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/creativity/">
                    <?= Yii::t('app', 'Creation') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/science/">
                    <?= Yii::t('app', 'The science') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/art/">
                    <?= Yii::t('app', 'Art') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/education/">
                    <?= Yii::t('app', 'Education') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/travel/">
                    <?= Yii::t('app', 'Travels') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/vacation/">
                    <?= Yii::t('app', 'Relaxation') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/celebration/">
                    <?= Yii::t('app', 'Celebration') ?>
                </a>
                <br>


            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/alcohol/">
                    <?= Yii::t('app', 'Alcohol') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/dispute/">
                    <?= Yii::t('app', 'Dispute') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/relations/">
                    <?= Yii::t('app', 'Relations') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/marriage/">
                    <?= Yii::t('app', 'Marriage') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/conception/">
                    <?= Yii::t('app', 'Conception') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/training/">
                    <?= Yii::t('app', 'Trainings') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/housework/">
                    <?= Yii::t('app', 'Housework') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/dreams/">
                    <?= Yii::t('app', 'Interpretation of dreams') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/hair/">
                    <?= Yii::t('app', 'A haircut') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/garden-work/">
                    <?= Yii::t('app', 'Work in the garden') ?>
                </a>
                <br>

                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/beginning/">
                    <?= Yii::t('app', 'Beginnings') ?>
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
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['previous'] ?>/
            <?= ($dayNameURL <> '') ? $dayNameURL . '/' : '' ?>">
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
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['next'] ?>/
            <?= ($dayNameURL <> '') ? $dayNameURL . '/' : '' ?>">
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

    //(new \common\components\dump\Dump())->printR($goodDays[$dayNameURL]);die;


    //(new \common\components\dump\Dump())->printR($calendarByYear['moonPhases']['moonThirdQuarter']);
    //number_format($week[$i]['moonPhase']['phase'], 2, '.', ' ');
    foreach ($calendarByYear['calendar'] as $key => $months) :?>
        <?php $countMonths++; ?>
        <div class="month col-xxs-12 col-xs-6 col-sm-4 col-md-3">
            <div class="month-name">
            <span class="fa fa-calendar">
                </span>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
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
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 1) ? ' md-one' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 2) ? ' md-two' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 3) ? ' md-three' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 4) ? ' md-four' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 5) ? ' md-five' : '' ?>
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
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 1) ? ' md-one' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 2) ? ' md-two' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 3) ? ' md-three' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 4) ? ' md-four' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByYear['moonDay'][$week[$i]['date']]] == 5) ? ' md-five' : '' ?>
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
        <?= Yii::t('app', 'Great days') ?>
    </div>

    <div class="md-two md-legend-color">
        &nbsp;
    </div>
    <div class="md-legend-text">
        <?= Yii::t('app', 'Good days') ?>
    </div>

    <div class="md-three md-legend-color">
        &nbsp;
    </div>
    <div class="md-legend-text">
        <?= Yii::t('app', 'Normal days') ?>
    </div>

    <div class="md-four md-legend-color">
        &nbsp;
    </div>
    <div class="md-legend-text">
        <?= Yii::t('app', 'Bad days') ?>
    </div>

    <div class="md-five md-legend-color">
        &nbsp;
    </div>
    <div class="md-legend-text">
        <?= Yii::t('app', 'Terrible days') ?>
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


