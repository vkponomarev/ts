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


?>


<a name="calendar-<?= $dateData['year']['current'] ?>"></a>
<h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?>
</h1>
<hr>

<div class="row">
    <?php /***************************** */ ?>
    <?php /***************************** Сегодняшний год */ ?>
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
    <?php /***************************** Ссылки на основной календарь*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 plates">
        <div class="plate">
            <div class="plate-header">
                <a href="/<?= Yii::$app->language ?>/calendar/years/<?= $dateData['year']['current'] ?>/">
                    <?= Yii::t('app', 'Calendar'); ?>
                </a>
                <?= ' / ' ?>
                <a href="/<?= Yii::$app->language ?>/calendar/weeks/days/today/">
                    <?= Yii::t('app', 'Today') ?>
                </a>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-01/"><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-02/"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-03/"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-04/"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-05/"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-06/"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-07/"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-08/"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-09/"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-10/"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-11/"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-12/"><?= $calendarNameOfMonths[12] ?></a><br>
                </div>
            </div>
            <div class="plate-links">
                <hr>
            </div>

            <div class="plate-links">
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/winter/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Winter') ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/spring/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Spring') ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/summer/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Summer') ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/seasons/autumn/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Autumn') ?></a><br>

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
<hr>


<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с годами туда сюда */ ?>
<?php /***************************** */ ?>

<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($dateData['year']['previous'] == '0000'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['previous'] ?>/">
                <?= $dateData['year']['previous'] ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">

        <?= $dateData['year']['current'] ?>

    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-right">
        <?php if ($dateData['year']['current'] == '9999'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['next'] ?>/">
                <?= $dateData['year']['next'] ?>
            </a>
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
<?php /***************************** Календарь с отмеченными праздниками конкретнрой страны */ ?>
<?php /***************************** */ ?>

<div class="row rflex year">
    <?php
    $countMonths = 0;
    $countWeeks = 0;
    foreach ($calendarByYear as $months) :?>

        <?php $countMonths++; ?>
        <div class="wmonth col-xxs-12 col-xs-6 col-sm-4 col-md-3">
            <div class="wmonth-name">
            <span class="fa fa-calendar">
                </span>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
                    <?= $calendarNameOfMonths[$countMonths]; ?>
                </a>

            </div>

            <div class="wweek-name">
                <div class="wday-name">
                    #
                </div>
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <div class="wday-name">
                        <?= $calendarNameOfDaysInWeek[$i]; ?>
                    </div>
                <?php endfor; ?>
            </div>


            <?php foreach ($months as $key => $week): ?>
                <?php $countWeeks++ ?>
                <div class="wweek">
                    <div class="wno-day">
                            <span>
                                <?php if ($countWeeks == 1 && $key > 50): ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['previous'] ?>/<?= $key; ?>/">
                                        <?= $key; ?>
                                    </a>
                                <?php else: ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['current'] ?>/<?= $key; ?>/">
                                        <?= $key; ?>
                                    </a>
                                <?php endif; ?>
                            </span>
                    </div>
                    <?php for ($i = 1; $i <= 5; $i++): ?>

                        <?php if (isset($week[$i]['monthDay'])): ?>

                            <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                            if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                <div class="wday-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                    <?= $week[$i]['monthDay']; ?>
                                     </span>
                                </div>
                            <?php else: ?>
                                <div class="wday">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                        <?php else: ?>
                            <div class="wno-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php for ($i = 6; $i <= 7; $i++): ?>
                        <?php if (isset($week[$i]['monthDay'])): ?>
                            <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                            if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                <div class="wday-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                    <?= $week[$i]['monthDay']; ?>
                                     </span>
                                </div>
                            <?php else: ?>
                                <div class="wday-off">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="wno-day">
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
<hr>
<br>


<?php /***************************** */ ?>
<?php /***************************** Ссылки на PDF календари */ ?>
<?php /***************************** */ ?>

<?php if ($PDFCalendarsData['exists']): ?>
    <br>
    <?php if ($holidaysData): ?>
        <a name="download-calendar"></a>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Download and print PDF calendar for {year} with week numbers', [
                'country_for' => $countryData['name_for'],
                'year' => $dateData['year']['current'],
            ]) ?>
        </h2>
    <?php else: ?>
        <a name="download-calendar"></a>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Download and print PDF calendar for {year} with week numbers', [
                'year' => $dateData['year']['current'],
            ]) ?>
        </h2>
    <?php endif; ?>
    <br><br>

    <div class="row rflex">
        <?php foreach ($PDFCalendarsData['pdf'] as $key => $pdf): ?>
            <?php if ($pdf['pdfExists']): ?>
                <div class="col-xxs-12 col-xs-6 col-md-4 col-lg-3 d-center pdf-download">
                    <?php if ($key == 'yearlyWithWeeksPNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Portrait calendar for the year with weeks') ?></div>
                    <?php endif; ?>
                    <?php if ($key == 'yearlyWithWeeksLNoHolidays'): ?>
                        <div class="pdf-header"><?= Yii::t('app', 'Landscape calendar for the year with weeks') ?></div>
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



