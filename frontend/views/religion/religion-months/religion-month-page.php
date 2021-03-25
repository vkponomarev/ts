<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByMonth common\components\calendar\CalendarByMonth
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
 * @var $countryURL array ['url','id','defaultID']
 *
 *
 */


?>


<a name="calendar"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<hr>

<div class="row">
    <?php /** Сегодняшний месяц */ ?>
    <div class="col-xxs-12 col-xs-6 current-date">
        <div class="current-date-div">
            <div class="current-date-one">
                <div class="current-date-year">
                    <?= $calendarNameOfMonths[$date->month->simple] ?>

                    <br>
                    <span class="current-date-month">
                    <?= $date->year->current ?>&nbsp;<?= Yii::t('app', 'year'); ?>
                </span>

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
                <?php if ($religion == 'orthodox') : ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Orthodox calendar') ?>
                    </a>
                <?php endif; ?>
                <?php if ($religion == 'catholic') : ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Catholic calendar') ?>
                    </a>
                <?php endif; ?>
                <?php if ($religion == 'muslim') : ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Muslim calendar') ?>
                    </a>
                <?php endif; ?>
                <?php if ($religion == 'jewish') : ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Jewish calendar') ?>
                    </a>
                <?php endif; ?>
                <?php if ($religion == 'hindu') : ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/years/<?= $date->year->current ?>/">
                        <?= Yii::t('app', 'Hindu calendar') ?>
                    </a>
                <?php endif; ?>
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
<?php /***************************** Верхняя плашка календаря с месяцами туда сюда*/ ?>
<?php /***************************** */ ?>

<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">

        <?php if ($date->year->current == $holidaysRange['start'] && $date->month->simple == 1) : ?>

        <?php else: ?>

            <?php if ($date->year->previous == '0000' && $date->month->simple == 1): ?>
            <?php else: ?>
                <?php if ($date->month->simple == 1): ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->previous ?>-<?= str_pad(12, 2, '0', STR_PAD_LEFT) ?>/">
                        <?= $calendarNameOfMonths[12] ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-<?= str_pad($date->month->simple - 1, 2, '0', STR_PAD_LEFT) ?>/">
                        <?= $calendarNameOfMonths[$date->month->simple - 1] ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">
        <?= $calendarNameOfMonths[$date->month->simple] ?>
    </div>

    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($date->year->current == $holidaysRange['end'] && $date->month->simple == 12) : ?>

        <?php else: ?>
            <?php if ($date->year->current == '9999' && $date->month->simple == 12): ?>

            <?php else: ?>
                <?php if ($date->month->simple == 12): ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->next ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/">
                        <?= $calendarNameOfMonths[1] ?>
                    </a>
                <?php else: ?>
                    <a href="/<?= Yii::$app->language ?>/calendar/religion/<?= $religion ?>/months/<?= $date->year->current ?>-<?= str_pad($date->month->simple + 1, 2, '0', STR_PAD_LEFT) ?>/">
                        <?= $calendarNameOfMonths[$date->month->simple + 1] ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<hr>

<?php /***************************** */ ?>
<?php /***************************** Календарь с отмеченными праздниками конкретнрой страны*/ ?>
<?php /***************************** */ ?>

<div class="row rflex myear">
    <?php
    $countMonths = $date->month->simple - 1;
    $countWeeks = 0;
    //(new \common\components\dump\Dump())->printR($calendarByMonth);die;
    foreach ($calendarByMonth as $months) :?>

        <?php $countMonths++; ?>
        <div class="bmmonth col-xxs-12 col-sm-6 col-xs-12">
            <div class="bmweek-name">
                <div class="bmday-name">
                    #
                </div>
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <div class="bmday-name">
                        <?= $calendarNameOfDaysInWeek[$i]; ?>
                    </div>
                <?php endfor; ?>
            </div>
            <?php foreach ($months as $keyMain => $week): ?>
                <?php $countWeeks++ ?>
                <div class="bmweek">
                    <div class="owno-day">
                            <span>
                                <?php if ($countWeeks == 1 && $keyMain > 50): ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->previous ?>/<?= $keyMain; ?>/">
                                        <?= $keyMain; ?>
                                    </a>
                                <?php else: ?>
                                    <a href="/<?= Yii::$app->language ?>/calendar/weeks/<?= $date->year->current ?>/<?= $keyMain; ?>/">
                                        <?= $keyMain; ?>
                                    </a>
                                <?php endif; ?>
                            </span>
                    </div>
                    <?php for ($i = 1; $i <= 5; $i++): ?>

                        <?php if (isset($week[$i]['monthDay'])): ?>

                            <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                            if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                <div class="bmday-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                     <a href="/<?= Yii::$app->language ?>/calendar/days/<?= $date->year->next ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/">
                <?= $week[$i]['monthDay']; ?>
            </a>

                                     </span>
                                </div>
                            <?php else: ?>
                                <div class="bmday">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                        <?php else: ?>
                            <div class="bmno-day">
                            <span>

                            </span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php for ($i = 6; $i <= 7; $i++): ?>
                        <?php if (isset($week[$i]['monthDay'])): ?>
                            <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                            if (false !== $key && $holidaysData[$key]['holiday'] == 1): ?>
                                <div class="bmday-holiday" data-title="<?= $holidaysData[$key]['name'] ?>">
                                     <span>
                                    <?= $week[$i]['monthDay']; ?>
                                     </span>
                                </div>
                            <?php else: ?>
                                <div class="bmday-off">
                                    <span>
                                    <?= $week[$i]['monthDay']; ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="bmno-day">
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
            <?= Yii::t('app', 'Calendar of Orthodox holidays and weekends for {month} {year}', [
                'year' => $date->year->current,
                'month' => $calendarNameOfMonths[$date->month->simple],
            ]) ?>
        </h2>
    <?php endif; ?>
    <?php if ($religion == 'catholic') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Calendar of Catholic holidays and weekends for {month} {year}', [
                'year' => $date->year->current,
                'month' => $calendarNameOfMonths[$date->month->simple],
            ]) ?>
        </h2>
    <?php endif; ?>
    <?php if ($religion == 'muslim') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Calendar of Muslim holidays and weekends for {month} {year}', [
                'year' => $date->year->current,
                'month' => $calendarNameOfMonths[$date->month->simple],
            ]) ?>
        </h2>
    <?php endif; ?>
    <?php if ($religion == 'jewish') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Calendar of Jewish holidays and weekends for {month} {year}', [
                'year' => $date->year->current,
                'month' => $calendarNameOfMonths[$date->month->simple],
            ]) ?>
        </h2>
    <?php endif; ?>
    <?php if ($religion == 'hindu') : ?>
        <h2 class="main-page-h1">
            <?= Yii::t('app', 'Calendar of Hindu holidays and weekends for {month} {year}', [
                'year' => $date->year->current,
                'month' => $calendarNameOfMonths[$date->month->simple],
            ]) ?>
        </h2>
    <?php endif; ?>

    <br><br>
    <div class="row rflex">

        <?php foreach ($holidaysData as $holiday) : ?>
            <?php $dateFormat = new \DateTime($holiday['date']) ?>
            <div class="col-xxs-12 col-xs-6 col-md-4 holidays-names-line">

                <div class="holidays-color-square-<?= $holiday['holiday'] == 1 ? 'green' : 'gray' ?>">
                </div>
                <?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                &nbsp;
                <?= $holiday['name']; ?>
                <?php //(new \common\components\dump\Dump())->printR($holiday['holiday_types']);?>

            </div>
        <?php endforeach; ?>
    </div>
    <br>
    <hr>
<?php endif; ?>
