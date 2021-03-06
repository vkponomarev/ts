<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $date common\componentsV2\date\Date
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
                <div class="current-date-year">
                    <?= $date->year->current ?>
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
    <?php /***************************** Выберите страну*/ ?>
    <?php /***************************** */ ?>


    <div class="col-xxs-12 col-xs-6 plates">
        <div class="plate">
            <div class="plate-header">
                <?= ($religion == 'orthodox')? Yii::t('app', 'Orthodox calendar') : '' ?>
                <?= ($religion == 'catholic')? Yii::t('app', 'Catholic calendar') : '' ?>
                <?= ($religion == 'muslim')? Yii::t('app', 'Muslim calendar') : '' ?>
                <?= ($religion == 'jewish')? Yii::t('app', 'Jewish calendar') : '' ?>
                <?= ($religion == 'hindu')? Yii::t('app', 'Hindu calendar') : '' ?>
            </div>

            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-01/"><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-02/"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-03/"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-04/"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-05/"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-06/"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-07/"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-08/"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-09/"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-10/"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-11/"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-12/"><?= $calendarNameOfMonths[12] ?></a><br>
                </div>
            </div>

            <div class="plate-links">
                <hr>
            </div>

            <div class="plate-links">
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/orthodox/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Orthodox calendar') ?>
                    </a>
                    <br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/catholic/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Catholic calendar') ?>
                    </a>
                    <br>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/muslim/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Muslim calendar') ?>
                    </a>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/jewish/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Jewish calendar') ?>
                    </a>
                    <br>

                    <a href="/<?= Yii::$app->language ?>/calendar/religion/hindu/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Hindu calendar') ?>
                    </a>
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
    <?php /***************************** Верхняя плашка календаря с годами туда сюда*/ ?>
    <?php /***************************** */ ?>


    <div class="row">
        <div class="col-xxs-12 col-xs-4 c-prev-next-left">
            <?php if ($date->year->previous == $holidaysRange['start'] - 1): ?>

            <?php else: ?>
                <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/years/<?= $date->year->previous ?>/">
                    <?= $date->year->previous ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="col-xxs-12 col-xs-4 c-prev-next-center">

            <?= $date->year->current ?>

        </div>
        <div class="col-xxs-12 col-xs-4 c-prev-next-right">

            <?php if ($date->year->current == $holidaysRange['end']): ?>

            <?php else: ?>
                <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/years/<?= $date->year->next ?>/">
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
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
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

                                <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                    <div class="day-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                    <?= $week[$i]['monthDay']; ?>
                                     </span>
                                    </div>
                                <?php else: ?>
                                    <div class="day">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                    </div>
                                <?php endif; ?>

                            <?php else: ?>
                                <div class="no-day">
                            <span>

                            </span>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php for ($i = 6; $i <= 7; $i++): ?>
                            <?php if (isset($week[$i]['monthDay'])): ?>
                                <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                    <div class="day-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                    <?= $week[$i]['monthDay']; ?>
                                     </span>
                                    </div>
                                <?php else: ?>
                                    <div class="day-off">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                    </div>
                                <?php endif; ?>
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

    <?php /***************************** */ ?>
    <?php /***************************** Список всех праздников конкретной страны*/ ?>
    <?php /***************************** */ ?>

    <?php if ($holidaysData): ?>
        <a name="calendar-of-holidays-and-weekends"></a>
        <?php if ($religion == 'orthodox') : ?>
            <h2 class="main-page-h1">
                <?= Yii::t('app', 'Calendar of Orthodox holidays and weekends for {year}', [
                    'year' => $date->year->current,
                ]) ?>
            </h2>
        <?php endif; ?>
        <?php if ($religion == 'catholic') : ?>
            <h2 class="main-page-h1">
                <?= Yii::t('app', 'Calendar of Catholic holidays and weekends for {year}', [
                    'year' => $date->year->current,
                ]) ?>
            </h2>
        <?php endif; ?>
        <?php if ($religion == 'muslim') : ?>
            <h2 class="main-page-h1">
                <?= Yii::t('app', 'Calendar of Muslim holidays and weekends for {year}', [
                    'year' => $date->year->current,
                ]) ?>
            </h2>
        <?php endif; ?>
        <?php if ($religion == 'jewish') : ?>
            <h2 class="main-page-h1">
                <?= Yii::t('app', 'Calendar of Jewish holidays and weekends for {year}', [
                    'year' => $date->year->current,
                ]) ?>
            </h2>
        <?php endif; ?>
        <?php if ($religion == 'hindu') : ?>
            <h2 class="main-page-h1">
                <?= Yii::t('app', 'Calendar of Hindu holidays and weekends for {year}', [
                    'year' => $date->year->current,
                ]) ?>
            </h2>
        <?php endif; ?>


        <br><br>
        <div class="row rflex">

            <?php foreach ($holidaysData as $holiday) : ?>
                <?php if (!isset($dates[$holiday['date']])) : ?>


                    <?php $dates[$holiday['date']] = 1 ?>
                    <?php $dateFormat = new \DateTime($holiday['date']) ?>
                    <div class="col-xxs-12 col-xs-6 col-md-4 holidays-names-line">

                        <div class="holidays-color-square-<?= $holiday['holiday'] == 1 ? 'green' : 'gray' ?>">
                        </div>
                        <?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                        &nbsp;
                        <?= $holiday['name']; ?>
                        <?php //(new \common\components\dump\Dump())->printR($holiday['holiday_types']);?>

                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <br>
        <hr>
    <?php endif; ?>





