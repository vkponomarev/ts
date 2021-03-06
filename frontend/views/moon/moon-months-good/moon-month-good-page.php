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
    <?php /***************************** Ссылки на основной календарь*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 plates">
        <div class="plate">
            <div class="plate-header">
                <?php if ($dayNameURL <> 'daysByRatingCount') : ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>">
                        <?= Yii::t('app', 'Auspicious days'); ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/years/<?= $dateData['year']['current'] ?>/">
                        <?= Yii::t('app', 'Auspicious days'); ?>
                    </a>

                <?php endif; ?>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-01/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>
                    "><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-02/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-03/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-04/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-05/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-06/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-07/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-08/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-09/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-10/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-11/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-12/
                    <?= ($dayNameURL <> 'daysByRatingCount') ? $dayNameURL . '/' : '' ?>"><?= $calendarNameOfMonths[12] ?></a><br>
                </div>
            </div>
            <div class="plate-links">
                <hr>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/days/today/">
                        <?= Yii::t('app', 'Moon day today') ?>
                    </a>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phases/days/today/">
                        <?= Yii::t('app', 'Moon phases today') ?>
                    </a>
                </div>
            </div>


        </div>
    </div>

</div>
<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <?php $linksCount = 0 ?>
            <?php foreach ($calendars->links as $link): ?>
                <?php $linksCount++ ?>
                <a class="plate-a-margin" href="<?= $link['url'] ?>">
                    <?= $link['name'] ?>
                </a>
                <?php if ($linksCount == count($calendars->links)) : ?>
                <?php else: ?>
                    <?= ' / ' ?>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <?php $moonLinksCount = 0 ?>
            <?php foreach ($calendars->moonLinks as $link): ?>
                <?php $moonLinksCount++ ?>
                <a class="plate-a-margin" href="<?= $link['url'] ?>">
                    <?= $link['name'] ?>
                </a>
                <?php if ($moonLinksCount == count($calendars->moonLinks)) : ?>
                <?php else: ?>
                    <?= ' / ' ?>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php /***************************** */ ?>
<?php /***************************** Ссылки на различеные направления благоприятных дней*/ ?>
<?php /***************************** */ ?>
<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/communication/">
                <?= Yii::t('app', 'Communication') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/money/">
                <?= Yii::t('app', 'Money') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/bosses/">
                <?= Yii::t('app', 'Bosses') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/job-change/">
                <?= Yii::t('app', 'Job change') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/property/">
                <?= Yii::t('app', 'The property') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/creativity/">
                <?= Yii::t('app', 'Creation') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/science/">
                <?= Yii::t('app', 'The science') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/art/">
                <?= Yii::t('app', 'Art') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/education/">
                <?= Yii::t('app', 'Education') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/travel/">
                <?= Yii::t('app', 'Travels') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/vacation/">
                <?= Yii::t('app', 'Relaxation') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/celebration/">
                <?= Yii::t('app', 'Celebration') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/alcohol/">
                <?= Yii::t('app', 'Alcohol') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/dispute/">
                <?= Yii::t('app', 'Dispute') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/relations/">
                <?= Yii::t('app', 'Relations') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/marriage/">
                <?= Yii::t('app', 'Marriage') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/conception/">
                <?= Yii::t('app', 'Conception') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/training/">
                <?= Yii::t('app', 'Trainings') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/housework/">
                <?= Yii::t('app', 'Housework') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/dreams/">
                <?= Yii::t('app', 'Interpretation of dreams') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/hair/">
                <?= Yii::t('app', 'A haircut') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/garden-work/">
                <?= Yii::t('app', 'Work in the garden') ?>
            </a>
            <?= ' / ' ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= $dateData['month']['number'] ?>/beginning/">
                <?= Yii::t('app', 'Beginnings') ?>
            </a>

        </div>
    </div>
</div>

<hr>

<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с месяцами туда сюда*/ ?>
<?php /***************************** */ ?>


<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($dateData['year']['previous'] == '0000' && $dateData['month']['numberSimple'] == 1): ?>

        <?php else: ?>
            <?php if ($dateData['month']['numberSimple'] == 1): ?>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['previous'] ?>-<?= str_pad(12, 2, '0', STR_PAD_LEFT) ?>/
            <?= ($dayNameURL <> '') ? $dayNameURL . '/' : '' ?>">
                    <?= $calendarNameOfMonths[12] ?>
                </a>
            <?php else: ?>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= str_pad($dateData['month']['numberSimple'] - 1, 2, '0', STR_PAD_LEFT) ?>/
            <?= ($dayNameURL <> '') ? $dayNameURL . '/' : '' ?>">
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
                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['next'] ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/
            <?= ($dayNameURL <> '') ? $dayNameURL . '/' : '' ?>">
                    <?= $calendarNameOfMonths[1] ?>
                </a>
            <?php else: ?>
                <a href="/<?= Yii::$app->language ?>/calendar/moon/good/months/<?= $dateData['year']['current'] ?>-<?= str_pad($dateData['month']['numberSimple'] + 1, 2, '0', STR_PAD_LEFT) ?>/
            <?= ($dayNameURL <> '') ? $dayNameURL . '/' : '' ?>">
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
            <a href="#download-calendar" class="btn btn-default">
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



    foreach ($calendarByMonth['calendar'] as $months) :?>

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
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 1) ? ' md-one' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 2) ? ' md-two' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 3) ? ' md-three' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 4) ? ' md-four' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 5) ? ' md-five' : '' ?>
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
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 1) ? ' md-one' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 2) ? ' md-two' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 3) ? ' md-three' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 4) ? ' md-four' : '' ?>
                            <?= ($goodDays[$dayNameURL][$calendarByMonth['moonDay'][$week[$i]['date']]] == 5) ? ' md-five' : '' ?>
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

    <a name="download-calendar"></a>
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



