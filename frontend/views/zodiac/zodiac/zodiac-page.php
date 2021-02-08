<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 *
 * @var $date common\componentsV2\date\Date
 * @var $eastern common\componentsV2\eastern\Eastern
 * @var $zodiacs common\componentsV2\zodiacs\Zodiacs
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
                         alt="<?= Yii::$app->params['text']['h1'] ?>">

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
                <div>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Zodiac Signs Calendar') ?>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<hr>

<br>
<h2>
    <?= Yii::t('app', 'Table of zodiac signs'); ?>
</h2>
<br><br>
<div class="row rflex year">


    <?php foreach ($zodiacs->urls->ids as $id => $url): ?>
        <div class="col-xxs-12 col-xs-6 zodiac-one-peace">

                    <img class="zodiac-pic" width="40"
                         src="/pictures/zodiac/<?= $zodiacs->pictures[$id]; ?>.png"
                         alt="">

                    <a class="zodiac-link" href="/<?= Yii::$app->language ?>/zodiac/<?= $url ?>/">
                        <?= $zodiacs->texts->namesCapital[$id] ?>
                    </a>
                    <br>
                    <?= Yii::t('app', 'Starts') ?> <?= ' ' . Yii::$app->formatter->asDate('2021-' . $zodiacs->ranges[$id]['start'], 'd MMMM') . ' '?>
                    <?= Yii::t('app', 'and ends') ?> <?= ' ' . Yii::$app->formatter->asDate('2021-' . $zodiacs->ranges[$id]['end'], 'd MMMM') ?>
                    <br>


        </div>
    <?php endforeach ?>
</div>

<hr>







