<?php


/**
 * Страница для отрисовки календаря на год для формата PDF PORTRAIT без праздников и выходных дней.
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

?>


<table class="calendar-pdf-header-table">
    <tr>
        <td class="calendar-pdf-header-table-left">
            <?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?>
                <h1 class="calendar-pdf-header-h1">
                    <?= $getParamsCustomize['header'] ?>
                </h1>

                <h2 class="calendar-pdf-header-h2">
                    <?= Yii::t('app', 'Year {year} calendar.', [
                        'year' => $dateData['year']['full'],
                        'country' => $countryData['name']
                    ]) ?>
                </h2>
            <?php else: ?>
                <h1 class="calendar-pdf-header-h1">
                    <?= Yii::t('app', 'Year {year} calendar.', [
                        'year' => $dateData['year']['full'],
                        'country' => $countryData['name']
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
<table class="cpdf-yp1-nh-year">


    <?php
    $countMonths = 0;
    $countWeeks = 0;
    foreach ($calendarByYear as $months) :?>
        <?php $countMonths++; ?>
        <?php if (($countMonths == 1) or ($countMonths == 4) or ($countMonths == 7) or ($countMonths == 10)): ?>
            <tr>
        <?php endif; ?>

        <td class="cpdf-yp1-nh-td-month">
            <table class="cpdf-yp1-nh-month">
                <tr class="cpdf-yp1-nh-month-name-line">
                    <td class="cpdf-yp1-nh-month-name-line-td" colspan="7">
            <span class="fa fa-calendar">
                </span>
                        <a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current']; ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
                            <?= $calendarNameOfMonths[$countMonths]; ?>
                        </a>
                    </td>
                </tr>
                <tr class="cpdf-yp1-nh-week">

                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <td class="cpdf-yp1-nh-day-name">
                            <?= $calendarNameOfDaysInWeek[$i]; ?>
                        </td>
                    <?php endfor; ?>

                </tr>

                <tr>
                    <td class="cpdf-yp1-nh-week-line" colspan="7">

                    </td>
                </tr>
                <?php foreach ($months as $week): ?>
                    <tr class="cpdf-yp1-nh-week">

                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if (isset($week[$i])): ?>

                                <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                if (false !== $key): ?>
                                    <td class="cpdf-yp1-nh-day cpdf-yp1-nh-day-holiday">
                                        <?= $week[$i]['monthDay']; ?>
                                    </td>
                                <?php else: ?>
                                    <td class="cpdf-yp1-nh-day">
                                        <?= $week[$i]['monthDay']; ?>
                                    </td>
                                <?php endif; ?>

                            <?php else: ?>
                                <td class="cpdf-yp1-nh-no-day">
                            <span>
                            </span>
                                </td>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php for ($i = 6; $i <= 7; $i++): ?>
                            <?php if (isset($week[$i])): ?>
                                <td class="cpdf-yp1-nh-day-weekend">
                            <span>
                                <?= $week[$i]['monthDay']; ?>
                            </span>
                                </td>
                            <?php else: ?>
                                <td class="cpdf-yp1-nh-no-day">
                            <span>

                            </span>
                                </td>
                            <?php endif; ?>
                        <?php endfor; ?>

                    </tr>
                <?php endforeach; ?>
            </table>
        </td>
        <?php if (($countMonths == 3) or ($countMonths == 6) or ($countMonths == 9) or ($countMonths == 12)): ?>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>

</table>