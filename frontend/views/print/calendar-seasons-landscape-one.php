<?php

/**
 * Страница для отрисовки календаря на год для формата PDF LANDSCAPE с праздниками и выходными днями.
 *
 * @var $yearData common\components\year\YearData
 * @var $calendarByYear common\components\calendar\CalendarByYear
 * @var $dateData common\components\date\DateData array
 * @var $getParamsCustomize common\components\getParams\GetParamsCustomize array
 * @var $countryData common\components\country\CountryData array
 * @var $calendarNameOfMonths common\components\calendar\CalendarNameOfMonths array
 * @var $calendarNameOfDaysInWeek common\components\calendar\CalendarNameOfDaysInWeek array
 * @var $holidaysData common\components\holidays\HolidaysByCountryByYearPDF array
 * @var $calendarBySeasons common\components\calendar\CalendarBySeasons array
 * @var $pageTextsMessages common\components\pageTexts\PageTextsMessagesByCalendarSeason array
 */


?>

<div style="width: 100%">
    <table class="calendar-pdf-header-table">
        <tr>
            <td class="calendar-pdf-header-table-left">
                <?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?>
                    <h1 class="calendar-pdf-header-h1">
                        <?= $getParamsCustomize['header'] ?>
                    </h1>

                    <h2 class="calendar-pdf-header-h2">
                        <?= Yii::t('app', 'Calendar {season} {year}. ({country})', [
                            'year' => $dateData['year']['full'],
                            'country' => $countryData['name'],
                            'season' => $pageTextsMessages['seasonOn']
                        ]) ?>
                    </h2>
                <?php else: ?>
                    <h1 class="calendar-pdf-header-h1">
                        <?= Yii::t('app', 'Calendar {season} {year}. ({country})', [
                            'year' => $dateData['year']['full'],
                            'country' => $countryData['name'],
                            'season' => $pageTextsMessages['seasonOn']
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
    <table class="cpdf-sl1-year">

        <tr>
        <?php
        $countMonths = $calendarBySeasons['calendarStartMonth'] - 1;
        $countWeeks = 0;

        foreach ($calendarBySeasons['calendar'] as $months) :?>
            <?php $countMonths++; ?>




                <td class="cpdf-sl1-td-month">
                    <table class="cpdf-sl1-month">
                        <tr class="cpdf-sl1-month-name-line">
                            <td class="cpdf-sl1-month-name-line-td" colspan="7">
            <span class="fa fa-calendar">
                </span>
                                <?php $countMonths = ($countMonths == 13) ? 1 : $countMonths; ?>
                                <?php $yearLink = ($countMonths == 12) ? $dateData['year']['previous'] : $dateData['year']['current']; ?>
                                <a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/months/<?= $yearLink ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/">
                                    <?= $calendarNameOfMonths[$countMonths]; ?>
                                </a>
                            </td>
                        </tr>
                        <tr class="cpdf-sl1-week">

                            <?php for ($i = 1; $i <= 7; $i++): ?>
                                <td class="cpdf-sl1-day-name">
                                    <?= $calendarNameOfDaysInWeek[$i]; ?>
                                </td>
                            <?php endfor; ?>

                        </tr>

                        <tr>
                            <td class="cpdf-sl1-week-line" colspan="7">

                            </td>
                        </tr>
                        <?php foreach ($months as $week): ?>
                            <tr class="cpdf-sl1-week">

                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <?php if (isset($week[$i])): ?>

                                        <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                        if (false !== $key): ?>
                                            <td class="cpdf-sl1-day cpdf-sl1-day-holiday">
                                                <?= $week[$i]['monthDay']; ?>
                                            </td>
                                        <?php else: ?>
                                            <td class="cpdf-sl1-day">
                                                <?= $week[$i]['monthDay']; ?>
                                            </td>
                                        <?php endif; ?>

                                    <?php else: ?>
                                        <td class="cpdf-sl1-no-day">
                            <span>
                            </span>
                                        </td>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php for ($i = 6; $i <= 7; $i++): ?>
                                    <?php if (isset($week[$i])): ?>

                                        <?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                        if (false !== $key): ?>
                                            <td class="cpdf-sl1-day cpdf-sl1-day-holiday">
                                                <?= $week[$i]['monthDay']; ?>
                                            </td>
                                        <?php else: ?>
                                            <td class="cpdf-sl1-day-weekend">
                                                <?= $week[$i]['monthDay']; ?>
                                            </td>
                                        <?php endif; ?>

                                    <?php else: ?>
                                        <td class="cpdf-sl1-no-day">
                            <span>

                            </span>
                                        </td>
                                    <?php endif; ?>
                                <?php endfor; ?>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                </td>



        <?php endforeach; ?>
        </tr>
    </table>
    <br>
    <div class="cpdf-sl1-holidays-table-border">

        <table class="cpdf-sl1-holidays-table">
            <tr>
                <td>
                    <table class="cpdf-sl1-holidays-table-inside">
                        <?php
                        $count = 0;
                        $countHolidays = count($holidaysData);
                        $countHolidays = ($countHolidays > 20 ? 20 : $countHolidays);
                        $countHolidaysHalf = ceil($countHolidays / 2);

                        for ($i = $count; $i < $countHolidaysHalf; $i++) :
                            $dateFormat = new \DateTime($holidaysData[$i]['date']);
                            ?>
                            <tr>
                                <td class="cpdf-sl1-holidays-name">
                                    <?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                </td>
                                <td class="cpdf-sl1-holidays-rounded-mark">
                                </td>
                                <td class="cpdf-sl1-holidays-name">
                                    <?= $holidaysData[$i]['name']; ?>
                                </td>


                            </tr>
                        <?php endfor; ?>
                    </table>
                </td>


                <td>
                    <table class="cpdf-sl1-holidays-table-inside">
                        <?php
                        $count = $countHolidaysHalf;

                        for ($i = $count; $i < $countHolidays; $i++) :
                            $dateFormat = new \DateTime($holidaysData[$i]['date']);
                            ?>
                            <tr>
                                <td class="cpdf-sl1-holidays-name">
                                    <?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>
                                </td>
                                <td class="cpdf-sl1-holidays-rounded-mark">
                                </td>
                                <td class="cpdf-sl1-holidays-name">
                                    <?= $holidaysData[$i]['name']; ?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>

