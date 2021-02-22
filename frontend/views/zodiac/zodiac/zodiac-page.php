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

    <div class="col-xxs-12 col-xs-6 plates">

        <div class="plate">
            <div class="plate-header">
                <a href="/<?= Yii::$app->language ?>/calendar/zodiac/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Zodiac signs calendar'); ?>
                </a>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-01/"><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-02/"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-03/"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-04/"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-05/"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-06/"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-07/"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-08/"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-09/"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-10/"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-11/"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/zodiac/months/<?= $date->year->current ?>-12/"><?= $calendarNameOfMonths[12] ?></a>
                </div>
            </div>
            <div class="plate-links">
                <hr>
            </div>
            <div class="plate-links">
                <a href="/<?= Yii::$app->language ?>/calendar/zodiac/days/today/">
                    <?= Yii::t('app', 'Zodiac sign today') ?>
                </a>
            </div>
        </div>
    </div>


</div>
<div class="row rflex">
    <div class="col-xxs-12 plates">
        <div class="plate-long">
            <?php foreach (range(1, 12) as $zodiacID): ?>
                <img class="eastern-pic" width="20"
                     src="/pictures/zodiac/<?= $zodiacs->pictures[$zodiacID]; ?>.png"
                     alt="<?= $zodiacs->texts->namesCapital[$zodiacID]; ?>">
                <?php if ($zodiacs->zodiac->id == $zodiacID) : ?>
                    <a class="plate-piece-current"
                       href="/<?= Yii::$app->language ?>/zodiac/<?= $zodiacs->urls->ids[$zodiacID]; ?>/">
                        <?= $zodiacs->texts->namesCapital[$zodiacID]; ?>
                    </a>
                <?php else: ?>

                    <a class="plate-a-margin"
                       href="/<?= Yii::$app->language ?>/zodiac/<?= $zodiacs->urls->ids[$zodiacID]; ?>/">
                        <?= $zodiacs->texts->namesCapital[$zodiacID]; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach ?>
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
            <?= Yii::t('app', 'Starts') ?> <?= ' ' . Yii::$app->formatter->asDate('2021-' . $zodiacs->ranges[$id]['start'], 'd MMMM') . ' ' ?>
            <?= Yii::t('app', 'and ends') ?> <?= ' ' . Yii::$app->formatter->asDate('2021-' . $zodiacs->ranges[$id]['end'], 'd MMMM') ?>
            <br>


        </div>
    <?php endforeach ?>
</div>

<hr>







