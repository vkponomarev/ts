<?php

/**
 * @var $this frontend\controllers\MainPageController
 *
 * @var $yearData common\components\year\YearData
 * @var $dateData common\components\date\DateData
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths
 * @var $calendarByYear common\components\calendar\CalendarByYear
 */


?>

<a name="calendar-<?= $dateData['year']['full'] ?>"></a><h1
        class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<br><br>


<div class="row">
    <?php /** Сегодняшнее число */?>
    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 current-date">
        <div class="current-date-div">
        <div class="current-date-one">
            <div class="current-date-date">
                <a class="current-date-link"
                   href="/<?= Yii::$app->language ?>/calendar/days/<?= $dateData['date']['current'] ?>/">
                    <?= Yii::$app->formatter->asDate($dateData['date']['current'], 'd'); ?>
                    <br>
                    <span class="current-date-month">
                    <?= Yii::$app->formatter->asDate($dateData['date']['current'], 'MMMM'); ?>
                </span>
                </a>
            </div>
        </div>
        <div class="current-date-text">
            <br>
            <?= $dateData['day']['nameFull'] ?>
            <br><br>
            <?= Yii::t('app', '{day} day', ['day' => $dateData['day']['count']]); ?>,&nbsp;
            <?= Yii::t('app', '{week} week', ['week' => $dateData['week']['count']]); ?>
            &nbsp;<?= $dateData['year']['full'] ?>.
            <br>
            <br>
            <?php if ($dateData['year']['leap']): ?>
                <?= Yii::t('app', 'Leap year'); ?>.
            <?php else: ?>
                <?= Yii::t('app', 'Not a leap year'); ?>.
            <?php endif; ?>
        </div>
        </div>
    </div>
    <?php /** Календраь */?>
    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 c-links-mp">
        <div class="c-links-block c-links-mp-header">
            <a class="c-links-mp-header-link"
               href="/<?= Yii::$app->language ?>/calendar/years/<?= $dateData['year']['full'] ?>/">
                <?= Yii::t('app', '{year} calendar', ['year' => $dateData['year']['current']]); ?>
            </a>
        </div>
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months ">
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-01/"><?= $calendarNameOfMonths[1]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-02/"><?= $calendarNameOfMonths[2]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-03/"><?= $calendarNameOfMonths[3]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-04/"><?= $calendarNameOfMonths[4]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-05/"><?= $calendarNameOfMonths[5]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-06/"><?= $calendarNameOfMonths[6]?></a><br>
            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-07/"><?= $calendarNameOfMonths[7]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-08/"><?= $calendarNameOfMonths[8]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-09/"><?= $calendarNameOfMonths[9]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-10/"><?= $calendarNameOfMonths[10]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-11/"><?= $calendarNameOfMonths[11]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current'] ?>-12/"><?= $calendarNameOfMonths[12]?></a><br>
            </div>
        </div>
        <div class="c-links-block">
            <hr>
        </div>
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/seasons/winter/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Winter')?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/seasons/spring/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Spring')?></a><br>
            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/seasons/summer/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Summer')?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/seasons/autumn/<?= $dateData['year']['current'] ?>/"><?= Yii::t('app', 'Autumn')?></a><br>

            </div>
        </div>
        <div class="c-links-block">
            <hr class="hr-1">
        </div>


    </div>
    <?php /** Календраь для печати */?>
    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 c-links-mp">
        <div class="c-links-block c-links-mp-header">
            <a class="c-links-mp-header-link"
               href="/<?= Yii::$app->language ?>/calendar/customize/">
                <?= Yii::t('app', 'Printable calendar (PDF)'); ?>
            </a>
        </div>
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months ">
                <a href="/<?= Yii::$app->language ?>/calendar/customize/?orientation=P&type=1">
                    <?= Yii::t('app', 'Yearly'); ?>
                </a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/customize/?orientation=P&type=2">
                    <?= Yii::t('app', 'Monthly'); ?>
                </a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/customize/?orientation=P&type=3">
                    <?= Yii::t('app', '2 Month'); ?>
                </a><br>

            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/customize/?orientation=P&type=4">
                    <?= Yii::t('app', 'Weekly'); ?>
                </a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/customize/?orientation=P&type=5">
                    <?= Yii::t('app', 'Daily'); ?>
                </a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/customize/">
                    <?= Yii::t('app', 'Customize calendar'); ?>
                </a><br>
            </div>
        </div>
        <div class="c-links-block">
        <hr class="hr-3">
        </div>



    </div>
    <?php /** Праздники */?>
    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 c-links-mp">
        <div class="c-links-block c-links-mp-header">
            <a class="c-links-mp-header-link"
               href="/<?= Yii::$app->language ?>/holidays/">
                <?= Yii::t('app', 'Holidays'); ?>
            </a>
        </div>
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months ">
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 1
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 1
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 1
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 1
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 1
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 1
                </a><br>
            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 2
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 2
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 2
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 2
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 2
                </a><br>
                <a href="/<?= Yii::$app->language ?>/holidays/">
                    Страна 2
                </a><br>

            </div>
        </div>
        <div class="c-links-block">
            <hr class="hr-4">
        </div>



    </div>

    <?php /** Сегодня */?>
    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 c-links-mp">
        <div class="c-links-block c-links-mp-header">
            <a class="c-links-mp-header-link"
               href="/<?= Yii::$app->language ?>/calendar/days/<?= $dateData['date']['current'] ?>/">
                <?= Yii::t('app', 'Today'); ?>
            </a>
        </div>
        <div class="c-links-block">
            Что же у нас сегодня
        </div>
        <div class="c-links-block c-links-mp-header">
            <a class="c-links-mp-header-link"
               href="/<?= Yii::$app->language ?>/calendar/days/<?= $dateData['date']['next'] ?>/">
                <?= Yii::t('app', 'Tomorrow'); ?>
            </a>
        </div>
        <div class="c-links-block">
            Что же у нас завтра
        </div>
        <div class="c-links-block">
            <hr class="hr">
        </div>
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months ">
                <a href="/<?= Yii::$app->language ?>/calendar/days/<?= $dateData['date']['afterNext'] ?>/">
                    <?= Yii::t('app', 'Day after tomorrow'); ?>
                </a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/days/<?= $dateData['date']['previous'] ?>/">
                    <?= Yii::t('app', 'Yesterday'); ?>
                </a><br>

            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/days/<?= $dateData['date']['afterPrevious'] ?>/">
                    <?= Yii::t('app', 'Day before yesterday'); ?>
                </a><br>

            </div>
        </div>
        <div class="c-links-block">
            <hr class="hr-5">
        </div>



    </div>

    <?php /** Производственный календарь */?>
    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 c-links-mp">
        <div class="c-links-block c-links-mp-header">

            <a class="c-links-mp-header-link"
               href="/<?= Yii::$app->language ?>/calendar/years/<?= $dateData['year']['current'] ?>/">
                <?= Yii::t('app', 'Business days calendar {year}', ['year' => $dateData['year']['current']]); ?>
            </a>
        </div>
        <div class="c-links-block">
            <div class="col-xs-6 c-links-mp-months ">
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-01/"><?= $calendarNameOfMonths[1]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-02/"><?= $calendarNameOfMonths[2]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-03/"><?= $calendarNameOfMonths[3]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-04/"><?= $calendarNameOfMonths[4]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-05/"><?= $calendarNameOfMonths[5]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-06/"><?= $calendarNameOfMonths[6]?></a><br>
            </div>
            <div class="col-xs-6 c-links-mp-months">
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-07/"><?= $calendarNameOfMonths[7]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-08/"><?= $calendarNameOfMonths[8]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-09/"><?= $calendarNameOfMonths[9]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-10/"><?= $calendarNameOfMonths[10]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-11/"><?= $calendarNameOfMonths[11]?></a><br>
                <a href="/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current'] ?>-12/"><?= $calendarNameOfMonths[12]?></a><br>
            </div>
        </div>
        <div class="c-links-block">
            <hr class="hr-2">
        </div>


    </div>
</div>






<div style="text-align: center">


    <a href="/calendar/years/<?= $yearData['previous'] ?>/">
        <?= $yearData['previous'] ?>
    </a>&nbsp;|
    <a href="/calendar/years/<?= $yearData['current'] ?>/">
        <?= $yearData['current'] ?>
    </a>&nbsp;|
    <a href="/calendar/years/<?= $yearData['next'] ?>/">
        <?= $yearData['next'] ?>
    </a>
</div>
<hr>


<div class="rflex year">
    <?php
    $countMonths = 0;
    $countWeeks = 0;

    foreach ($calendarByYear as $months) :?>

        <?php $countMonths++; ?>
        <div class="month">
            <div class="month-name">
            <span class="fa fa-calendar">
                </span>
                <a href="/calendar/months/<?= $yearData['current'] ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
                    <?= $calendarNameOfMonths[$countMonths]; ?>
                </a>
            </div>

            <div class="week">
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <div class="day-name">
                        <?= $calendarNameOfDaysInWeek[$i] ?>
                    </div>
                <?php endfor; ?>
            </div>


            <?php foreach ($months as $week): ?>

                <div class="week">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php if (isset($week[$i]['monthDay'])): ?>
                            <div class="day">
                            <span>
                                <?= $week[$i]['monthDay']; ?>
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
                                <?= $week[$i]['monthDay']; ?>
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