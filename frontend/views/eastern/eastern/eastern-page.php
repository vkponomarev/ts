<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 *
 * @var $date common\components\date\Date
 * @var $eastern common\componentsV2\eastern\Eastern
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
                         src="/pictures/chinese-new-year.png"
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
                <?= Yii::t('app', 'Eastern calendar'); ?>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 c-links-mp-months">
                    <?php foreach (range(1, 6) as $id): ?>
                        <div>
                            <img class="eastern-pic" width="25"
                                 src="/pictures/eastern-animals/<?= $eastern->animals->pictures[$id]; ?>.png"
                                 alt="<?= $eastern->text->names[$id]; ?>">
                            <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[$id] ?>/">
                                <?= $eastern->text->names[$id]; ?>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="col-xs-6 c-links-mp-months">
                    <?php foreach (range(7, 12) as $id): ?>
                        <div>
                            <img class="eastern-pic" width="25"
                                 src="/pictures/eastern-animals/<?= $eastern->animals->pictures[$id]; ?>.png"
                                 alt="<?= $eastern->text->names[$id]; ?>">
                            <a href="/calendar/eastern/animals/<?= $eastern->animals->urls[$id] ?>/">
                                <?= $eastern->text->names[$id]; ?>
                            </a>
                        </div>
                    <?php endforeach ?>
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

<br>
<h2>
    <?= Yii::t('app', 'Eastern Chinese calendar by years'); ?>
</h2>
<br><br>
<div class="row rflex year">


    <?php foreach ($eastern->calendar->years as $year => $data): ?>
        <div class="col-xxs-4 col-xs-2 col-sm-2 col-md-1 eastern-one-peace">
            <div>
                <img class="eastern-pic" width="40"
                     src="/pictures/eastern-animals/<?= $eastern->animals->pictures[$data['animal']]; ?>.png"
                     alt="">
                <br>
                <?= $eastern->text->colors[$data['color']] ?>
                <br>
                <?= $eastern->text->elements[$data['element']] ?>
            </div>
            <div>
                <a class="eastern-year-link" href="/calendar/eastern/years/<?= $year ?>/"><?= $year ?></a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<hr>







