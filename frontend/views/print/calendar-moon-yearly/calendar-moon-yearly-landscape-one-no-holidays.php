<?php

/**
 * Страница для отрисовки календаря на год для формата PDF LANDSCAPE без праздников и выходных дней.
 *
 * @var $yearData common\components\year\YearData
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $dateData common\components\date\DateData array
 * @var $getParamsCustomize common\components\getParams\GetParamsCustomize array
 * @var $countryData common\components\country\CountryData array
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths array
 * @var $calendarNameOfDaysInWeek common\components\calendar\CalendarNameOfDaysInWeek array
 * @var $holidaysData common\components\holidays\HolidaysByCountryByYearPDF array
 */
$moon = new \common\components\moon\Moon();
?>


<table class="calendar-pdf-header-table">
    <tr>
        <td class="calendar-pdf-header-table-left">
            <?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?>
                <h1 class="calendar-pdf-header-h1">
                    <?= $getParamsCustomize['header'] ?>
                </h1>
                <h2 class="calendar-pdf-header-h2">
                    <?= Yii::t('app', 'Year {year} PDF lunar calendar', [
                        'year' => $dateData['year']['full'],
                    ]) ?>
                </h2>
            <?php else: ?>
                <h1 class="calendar-pdf-header-h1">
                    <?= Yii::t('app', 'Year {year} PDF lunar calendar', [
                        'year' => $dateData['year']['full'],
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
<table class="cpdf-myl1-nh-year">


    <?php
    $countMonths = 0;
    $countWeeks = 0;
    $countMoonDay = 0;
    foreach ($calendarByYear['calendar'] as $months) :?>
        <?php $countMonths++; ?>
        <?php if (($countMonths == 1) or ($countMonths == 5) or ($countMonths == 9)): ?>
            <tr>
        <?php endif; ?>

        <td class="cpdf-myl1-nh-td-month">
            <table class="cpdf-myl1-nh-month">
                <tr class="cpdf-myl1-nh-month-name-line">
                    <td class="cpdf-myl1-nh-month-name-line-td" colspan="7">
            <span class="fa fa-calendar">
                </span>
                        <a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/moon/months/<?= $dateData['year']['current']; ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
                            <?= $calendarNameOfMonths[$countMonths]; ?>
                        </a>
                    </td>
                </tr>
                <tr class="cpdf-myl1-nh-week">

                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <td class="cpdf-myl1-nh-day-name">
                            <?= $calendarNameOfDaysInWeek[$i]; ?>
                        </td>
                    <?php endfor; ?>

                </tr>

                <tr>
                    <td class="cpdf-myl1-nh-week-line" colspan="7">

                    </td>
                </tr>
                <?php foreach ($months as $week): ?>
                    <tr class="cpdf-myl1-nh-week">

                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if (isset($week[$i])): ?>

                                    <td class="cpdf-myl1-nh-day cpdf-myl1-nh-day">
                                        <?= $week[$i]['monthDay']; ?><br>
                                        <img class="cpdf-myl1-nh-moon-img" width="10"
                                             src="https://timesles.com/pictures/moon-phases/<?= $moon->pictures($week[$i], $calendarByYear['moonPhases']) ?>">
                                        <?= $calendarByYear['moonDay'][$week[$i]['date']]; ?>
                                    </td>

                            <?php else: ?>
                                <td class="cpdf-myl1-nh-no-day">
                            <span>
                            </span>
                                </td>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php for ($i = 6; $i <= 7; $i++): ?>
                            <?php if (isset($week[$i])): ?>


                                <td class="cpdf-myl1-nh-day-weekend">
                            <span>
                                <?= $week[$i]['monthDay']; ?><br>
                                         <img class="cpdf-myl1-nh-moon-img" width="10"
                                              src="/pictures/moon-phases/<?= $moon->pictures($week[$i], $calendarByYear['moonPhases']) ?>">
                                    <?= $calendarByYear['moonDay'][$week[$i]['date']]; ?>
                            </span>
                                </td>
                            <?php else: ?>
                                <td class="cpdf-myl1-nh-no-day">
                            <span>

                            </span>
                                </td>
                            <?php endif; ?>
                        <?php endfor; ?>

                    </tr>
                <?php endforeach; ?>
            </table>
        </td>
        <?php if (($countMonths == 4) or ($countMonths == 8) or ($countMonths == 12)): ?>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>

</table>