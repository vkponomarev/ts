<?php

/**
 * @var $this frontend\controllers\YearsController
 *
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $dateData common\components\date\DateData
 * @var $date common\componentsV2\date\Date
 * @var $dateToday common\componentsV2\date\Date
 * @var $holidaysTypesData common\components\holidaysTypes\HolidaysTypesData
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths
 * @var $calendarNameOfDaysInWeek common\components\calendar\CalendarNameOfDaysInWeek
 * @var $PDFCalendarsData common\components\PDFCalendars\PDFCalendarsYearlyExists
 * @var $getParamsByCalendarYears common\components\getParams\GetParamsByCalendarYears
 * @var $holidaysRange common\components\holidays\HolidaysRange
 */

$moon = new \common\components\moon\Moon();
?>


<a name="calendar-<?= $date->year->current ?>"></a><h1
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


                    <img width="80"
                         src="/pictures/moon-phases/<?= $moon->pictures($calendarByMonth['calendar'][$date->month->simple][$date->week->current][$date->week->dayNumber], $calendarByMonth['moonPhases']) ?>">

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
                <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/years/<?= $date->year->current ?>/">
                    <?= Yii::t('app', 'Moon phases'); ?>
                </a>
            </div>
            <div class="plate-links">
                <div class="col-xs-6 plate-links-col ">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-01/"><?= $calendarNameOfMonths[1] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-02/"><?= $calendarNameOfMonths[2] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-03/"><?= $calendarNameOfMonths[3] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-04/"><?= $calendarNameOfMonths[4] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-05/"><?= $calendarNameOfMonths[5] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-06/"><?= $calendarNameOfMonths[6] ?></a><br>
                </div>
                <div class="col-xs-6 plate-links-col">
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-07/"><?= $calendarNameOfMonths[7] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-08/"><?= $calendarNameOfMonths[8] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-09/"><?= $calendarNameOfMonths[9] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-10/"><?= $calendarNameOfMonths[10] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-11/"><?= $calendarNameOfMonths[11] ?></a><br>
                    <a href="/<?= Yii::$app->language ?>/calendar/moon/phase/months/<?= $date->year->current ?>-12/"><?= $calendarNameOfMonths[12] ?></a><br>
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
<hr>
<?php /***************************** */ ?>
<?php /***************************** Верхняя плашка календаря с годами туда сюда*/ ?>
<?php /***************************** */ ?>


<div class="row">
    <div class="col-xxs-12 col-xs-4 c-prev-next-left">
        <?php if ($date->current == '2000-01-01') : ?>
        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/phases/days/
            <?php if ($dayNameURL) : ?>
                <?= ($dayNameURL == 'today') ? 'yesterday' : '' ?>
                <?= ($dayNameURL == 'yesterday') ? $date->previous : '' ?>
                <?= ($dayNameURL == 'tomorrow') ? 'today' : '' ?>
            <?php else: ?>
                <?php if ($date->previous == $dateToday->next) : ?>
                    <?= 'tomorrow' ?>
                <?php elseif ($date->previous == $dateToday->previous): ?>
                    <?= 'yesterday' ?>
                <?php elseif ($date->previous == $dateToday->current): ?>
                    <?= 'today' ?>
                <?php else: ?>
                    <?= $date->previous ?>
                <?php endif; ?>
            <?php endif; ?>
            /">
                <?php if ($dayNameURL) : ?>
                    <?= ($dayNameURL == 'today') ? Yii::t('app', 'Yesterday') : '' ?>
                    <?= ($dayNameURL == 'yesterday') ? Yii::$app->formatter->asDate($date->previous, 'medium') : '' ?>
                    <?= ($dayNameURL == 'tomorrow') ? Yii::t('app', 'Today') : '' ?>
                <?php else: ?>
                    <?php if ($date->previous == $dateToday->next) : ?>
                        <?= Yii::t('app', 'Tomorrow') ?>
                    <?php elseif ($date->previous == $dateToday->previous): ?>
                        <?= Yii::t('app', 'Yesterday') ?>
                    <?php elseif ($date->previous == $dateToday->current): ?>
                        <?= Yii::t('app', 'Today') ?>
                    <?php else: ?>
                        <?= Yii::$app->formatter->asDate($date->previous, 'medium') ?>
                    <?php endif; ?>

                <?php endif; ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-center">
        <?php if ($dayNameURL) : ?>
            <?= ($dayNameURL == 'today') ? Yii::t('app', 'Today') : '' ?>
            <?= ($dayNameURL == 'yesterday') ? Yii::t('app', 'Yesterday') : '' ?>
            <?= ($dayNameURL == 'tomorrow') ? Yii::t('app', 'Tomorrow') : '' ?>
        <?php else: ?>
            <?php if ($date->current == $dateToday->next) : ?>
                <?= Yii::t('app', 'Tomorrow') ?>
            <?php elseif ($date->current == $dateToday->previous): ?>
                <?= Yii::t('app', 'Yesterday') ?>
            <?php elseif ($date->current == $dateToday->current): ?>
                <?= Yii::t('app', 'Today') ?>
            <?php else: ?>
                <?= Yii::$app->formatter->asDate($date->current, 'medium') ?>
            <?php endif; ?>

        <?php endif; ?>
    </div>
    <div class="col-xxs-12 col-xs-4 c-prev-next-right">

        <?php if ($date->current == '2030-12-31') : ?>
        <?php else: ?>
            <a href="/<?= Yii::$app->language ?>/calendar/moon/phases/days/
            <?php if ($dayNameURL) : ?>
                <?= ($dayNameURL == 'today') ? 'tomorrow' : '' ?>
                <?= ($dayNameURL == 'yesterday') ? 'today' : '' ?>
                <?= ($dayNameURL == 'tomorrow') ? $date->next : '' ?>
            <?php else: ?>
                <?php if ($date->next == $dateToday->next) : ?>
                    <?= 'tomorrow' ?>
                <?php elseif ($date->next == $dateToday->previous): ?>
                    <?= 'yesterday' ?>
                <?php elseif ($date->next == $dateToday->current): ?>
                    <?= 'today' ?>
                <?php else: ?>
                    <?= $date->next ?>
                <?php endif; ?>
        <?php endif; ?>

            /">
                <?php if ($dayNameURL) : ?>
                    <?= ($dayNameURL == 'today') ? Yii::t('app', 'Tomorrow') : '' ?>
                    <?= ($dayNameURL == 'yesterday') ? Yii::t('app', 'Today') : '' ?>
                    <?= ($dayNameURL == 'tomorrow') ? Yii::$app->formatter->asDate($date->next, 'medium') : '' ?>
                <?php else: ?>
                    <?php if ($date->next == $dateToday->next) : ?>
                        <?= Yii::t('app', 'Tomorrow') ?>
                    <?php elseif ($date->next == $dateToday->previous): ?>
                        <?= Yii::t('app', 'Yesterday') ?>
                    <?php elseif ($date->next == $dateToday->current): ?>
                        <?= Yii::t('app', 'Today') ?>
                    <?php else: ?>
                        <?= Yii::$app->formatter->asDate($date->next, 'medium') ?>
                    <?php endif; ?>

                <?php endif; ?>
            </a>
        <?php endif; ?>
    </div>
</div>
<hr>
<br>

<div class="row rflex myear">
    <?php
    $countMonths = $date->month->simple - 1;
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
                            <div class="mday <?= ($week[$i]['date'] == $date->current)? ' mday-current' : '' ?>">
                                    <span>
                                   <?= $week[$i]['monthDay']; ?><br>
                                         <img width="18"
                                              src="/pictures/moon-phases/<?= $moon->pictures($week[$i], $calendarByMonth['moonPhases']) ?>"><br>
                                    <?= $calendarByMonth['moonDay'][$week[$i]['date']]; ?><br>


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

                            <div class="mday-off <?= ($week[$i]['date'] == $date->current)? ' mday-current' : '' ?>">
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


