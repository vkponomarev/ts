<?php

/**
 * @var $this frontend\controllers\MainPageController
 * @var $modal frontend\controllers\YoutubeController
 * @var $search frontend\controllers\SearchController
 *
 * @var $yearData common\components\year\YearData
 * @var $calendarByYear common\components\calendar\CalendarByYear
 */


?>

<a name="calendar-<?= $yearData['current'] ?>"></a><h1
        class="main-page-h1"><?= Yii::t('app', 'Календарь на 2020 год') ?></h1>
<br><br>


<div style="text-align: center">


    <a href="/calendar/years/<?= $yearData['previous'] ?>">
        <?= $yearData['previous'] ?>
    </a>
    &nbsp;|
    <a href="/calendar/years/<?= $yearData['next'] ?>">
        <?= $yearData['next'] ?>
    </a>
</div>

<br>
<div style="text-align: center">



    <a href="/calendar/seasons/winter/<?= $yearData['current'] ?>/">
        Зима
    </a>
    &nbsp;|
    <a href="/calendar/seasons/spring/<?= $yearData['current'] ?>/">
        Весна
    </a>
    &nbsp;|
    <a href="/calendar/seasons/summer/<?= $yearData['current'] ?>/">
        Лето
    </a>
    &nbsp;|
    <a href="/calendar/seasons/autumn/<?= $yearData['current'] ?>/">
        Осень
    </a>
</div>

<div style="text-align: center">


    <?php if ($monthData == 1): ?>

        <a href="/calendar/months/<?= $yearData['previous'] ?>-<?= str_pad(12, 2, '0', STR_PAD_LEFT) ?>/">
            <?= $calendarNameOfMonths[12] ?>
        </a>
        &nbsp;|
        <a href="/calendar/months/<?= $yearData['current'] ?>-<?= str_pad($monthData+1, 2, '0', STR_PAD_LEFT) ?>/">
            <?= $calendarNameOfMonths[$monthData+1] ?>
        </a>

    <?php elseif ($monthData == 12):?>

        <a href="/calendar/months/<?= $yearData['current'] ?>-<?= str_pad($monthData-1, 2, '0', STR_PAD_LEFT) ?>/">
            <?= $calendarNameOfMonths[$monthData-1] ?>
        </a>
        &nbsp;|
        <a href="/calendar/months/<?= $yearData['next'] ?>-<?= str_pad(1, 2, '0', STR_PAD_LEFT) ?>/">
            <?= $calendarNameOfMonths[1] ?>
        </a>

    <?php else:?>


        <a href="/calendar/months/<?= $yearData['current'] ?>-<?= str_pad($monthData-1, 2, '0', STR_PAD_LEFT) ?>/">
            <?= $calendarNameOfMonths[$monthData-1] ?>
        </a>
        &nbsp;|
        <a href="/calendar/months/<?= $yearData['current'] ?>-<?= str_pad($monthData+1, 2, '0', STR_PAD_LEFT) ?>/">
            <?= $calendarNameOfMonths[$monthData+1] ?>
        </a>

    <?php endif;?>
</div>

<hr>

<div class="rflex year">
    <?php
    $countMonths = $monthData-1;
    $countWeeks = 0;
    foreach ($calendarByMonth as $months) :?>

        <?php $countMonths++; ?>
        <div class="month">
            <div class="month-name">
            <span class="fa fa-calendar">
                </span>
                <a href="/">
                    <?= $calendarNameOfMonths[$countMonths]; ?>
                </a>
            </div>

            <div class="week">
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <div class="day-name">
                        <?= $calendarNameOfDaysInWeek[$i]; ?>
                    </div>
                <?php endfor; ?>
            </div>


            <?php foreach ($months as $week): ?>
                <div class="week">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php if (isset($week[$i])): ?>
                            <div class="day">
                            <span>
                                <a href="/calendar/days/<?= $yearData['current'] ?>-<?= str_pad($monthData, 2, '0', STR_PAD_LEFT) ?>-<?= str_pad($week[$i], 2, '0', STR_PAD_LEFT) ?>/">
                                    <?= $week[$i] ?>
                                </a>

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
                        <?php if (isset($week[$i])): ?>
                            <div class="day-off">
                            <span>
                                <?= $week[$i]; ?>
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
