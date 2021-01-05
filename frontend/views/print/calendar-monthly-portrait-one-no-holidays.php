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


<table class="calendar-pdf-header-table">
    <tr>
        <td class="calendar-pdf-header-table-left">
            <?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?>
                <h1 class="calendar-pdf-header-h1"><?= $getParamsCustomize['header'] ?></h1>
                <h2 class="calendar-pdf-header-h2">
                    <?= Yii::t('app', 'Calendar for {month} {year}', [
                        'year' => $dateData['year']['full'],
                        'country' => $countryData['name'],
                        'month' => $calendarNameOfMonths[$dateData['month']['numberSimple']]
                    ]) ?>
                </h2>
            <?php else: ?>
                <h1 class="calendar-pdf-header-h1">
                    <?= Yii::t('app', 'Calendar for {month} {year}', [
                        'year' => $dateData['year']['full'],
                        'country' => $countryData['name'],
                        'month' => $calendarNameOfMonths[$dateData['month']['numberSimple']]
                    ]) ?>
                </h1>
            <?php endif; ?>

        </td>

        <td class="calendar-pdf-header-table-right">
            <h3 class="calendar-pdf-header-h3"><a href="https://timesles.com">TIMESLES.COM</a></h3>
        </td>
    </tr>
</table>
<br>
<table class="cpdf-mp1-nh-year">


    <?php
    $countMonths = $dateData['month']['numberSimple']-1;
    $countWeeks = 0;
    foreach ($calendarByMonths as $months) :?>
        <?php $countMonths++; ?>

            <tr>


        <td class="cpdf-mp1-nh-td-month">
            <table class="cpdf-mp1-nh-month">

                <tr class="cpdf-mp1-nh-week-day-name">

                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <td class="cpdf-mp1-nh-day-name">
                            <?= $calendarNameOfDaysInWeek[$i]; ?>
                        </td>
                    <?php endfor; ?>

                </tr>
                <tr>
                    <td class="cpdf-mp1-nh-week-line" colspan="7">

                    </td>
                </tr>
                <?php foreach ($months as $week): ?>
                    <tr class="cpdf-mp1-nh-week">

                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if (isset($week[$i])): ?>

                                <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                if (false !== $key): ?>
                                    <td class="cpdf-mp1-nh-day cpdf-mp1-nh-day-holiday">
                                        <?= $week[$i]['monthDay']; ?>
                                    </td>
                                <?php else: ?>
                                    <td class="cpdf-mp1-nh-day cpdf-mp1-nh-day">
                                        <?= $week[$i]['monthDay']; ?>
                                    </td>
                                <?php endif; ?>

                            <?php else: ?>
                                <td class="cpdf-mp1-nh-day cpdf-mp1-nh-no-day">
                            <span>
                            </span>
                                </td>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php for ($i = 6; $i <= 7; $i++): ?>
                            <?php if (isset($week[$i])): ?>

                                <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                if (false !== $key): ?>
                                    <td class="cpdf-mp1-nh-day cpdf-mp1-nh-day-holiday">
                                        <?= $week[$i]['monthDay']; ?>
                                    </td>
                                <?php else: ?>
                                    <td class="cpdf-mp1-nh-day cpdf-mp1-nh-day-weekend">
                                        <?= $week[$i]['monthDay']; ?>
                                    </td>
                                <?php endif; ?>

                            <?php else: ?>
                                <td class="cpdf-mp1-nh-day cpdf-mp1-nh-no-day">
                            <span>

                            </span>
                                </td>
                            <?php endif; ?>
                        <?php endfor; ?>

                    </tr>
                <?php endforeach; ?>
            </table>
        </td>

            </tr>

    <?php endforeach; ?>

</table>
