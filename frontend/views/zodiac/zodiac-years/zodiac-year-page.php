<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 *
 * @var $date common\componentsV2\date\Date
 * @var $zodiacs common\componentsV2\zodiacs\Zodiacs
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
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


<a name="calendar"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row">
    <?php /***************************** */ ?>
    <?php /***************************** Сегодняшний год*/ ?>
    <?php /***************************** */ ?>

    <div class="col-xxs-12 col-xs-6 current-date">
        <div class="current-date-div">
            <div class="current-date-one">
                <div class="eastern-main-pic-div">
                    <img class="eastern-pic" width="100"
                         src="/pictures/zodiac/zodiac.png"
                         alt="">

                    <span class="current-date-month">

                    </span>
                </div>
            </div>
            <div class="current-date-text">

                <?= Yii::$app->params['text']['text1'] ?>


            </div>
        </div>
    </div>
    <div class="col-xxs-12 col-xs-6 c-links-mp">
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months">
                <?php foreach (range(1, 6) as $zodiacID): ?>
                    <div>
                        <img class="eastern-pic" width="20"
                             src="/pictures/zodiac/<?= $zodiacs->pictures[$zodiacID]; ?>.png"
                             alt="<?= $zodiacs->texts->namesCapital[$zodiacID]; ?>">
                        <a href="/<?= Yii::$app->language ?>/zodiac/<?= $zodiacs->urls->ids[$zodiacID]; ?>/">
                            <?= $zodiacs->texts->namesCapital[$zodiacID]; ?>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-xs-6 c-links-mp-months">
                <?php foreach (range(7, 12) as $zodiacID): ?>
                    <div>
                        <img class="eastern-pic" width="20"
                             src="/pictures/zodiac/<?= $zodiacs->pictures[$zodiacID]; ?>.png"
                             alt="<?= $zodiacs->texts->namesCapital[$zodiacID]; ?>">
                        <a href="/<?= Yii::$app->language ?>/zodiac/<?= $zodiacs->urls->ids[$zodiacID]; ?>/">
                            <?= $zodiacs->texts->namesCapital[$zodiacID]; ?>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с годами туда сюда*/ ?>
<?php /***************************** */ ?>


<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($date->year->previous == '0000'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/zodiac/years/<?= $date->year->previous ?>/">
                <?= $date->year->previous ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">

        <?= $date->year->current ?>

    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($date->year->current == '9999'): ?>

        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/zodiac/years/<?= $date->year->next ?>/">
                <?= $date->year->next ?>
            </a>
        <?php endif; ?>
    </div>
</div>
<hr>

<?php /***************************** */ ?>
<?php /***************************** Календарь с отмеченными праздниками конкретнрой страны*/ ?>
<?php /***************************** */ ?>


<div class="row rflex year">
    <?php
    $countMonths = 0;
    $countWeeks = 0;
    foreach ($calendarByYear as $months) :?>

        <?php $countMonths++; ?>
        <div class="month col-xxs-12 col-xs-6 col-sm-4 col-md-3">
            <div class="month-name">
            <span class="fa fa-calendar">
                </span>
                <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
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
                <div class="week">
                    <?php for ($i = 1; $i <= 5; $i++): ?>

                        <?php if (isset($week[$i]['monthDay'])): ?>


                            <div class="day">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?><br>

                                        <img class="" width="18"
                                             src="/pictures/zodiac/<?= $zodiacs->pictures[$week[$i]['zodiacID']] ?>.png"
                                             alt="">

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

                            <div class="day-off">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?><br>
                                        <img class="" width="18"
                                             src="/pictures/zodiac/<?= $zodiacs->pictures[$week[$i]['zodiacID']] ?>.png"
                                             alt="">
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
<hr>
<br>


