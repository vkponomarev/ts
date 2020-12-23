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

<table class="cpdf-dpm1l-month">
    <tr class="cpdf-dpm1l-month-name-line">
        <td class="cpdf-dpm1l-month-name-line-td" colspan="7">
            <span class="fa fa-calendar">
                </span>
            <a href="/" class="cpdf-dpm1l-month-name-a">
                <?= $calendarNameOfMonths[$month]; ?>
            </a>
        </td>
    </tr>
    <tr class="cpdf-dpm1l-week">

        <?php for ($i = 1; $i <= 7; $i++): ?>
            <td class="cpdf-dpm1l-day-name">
                <?= $calendarNameOfDaysInWeek[$i]; ?>
            </td>
        <?php endfor; ?>

    </tr>
    <tr>
        <td class="cpdf-dpm1l-week-line" colspan="7">

        </td>
    </tr>
    <?php $countWeeks = 0; ?>
    <?php foreach ($calendarByYear[$month] as $key => $week): ?>


            <tr class="cpdf-dpm1l-week">

        <?php for ($i = 1; $i <= 5; $i++): ?>
            <?php if (isset($week[$i])): ?>

                <?php $key = array_search($week[$i]['date'], array_column($holidaysByCountryByYear, 'date'));
                if (false !== $key): ?>
                    <td class="cpdf-dpm1l-day cpdf-dpm1l-day-holiday <?php if($week[$i]['monthDay'] == $monthDay){ echo 'cpdf-dpm1l-this-day';}?>">

                        <?= $week[$i]['monthDay']; ?>
                    </td>
                <?php else: ?>
                    <td class="cpdf-dpm1l-day cpdf-dpm1l-day <?php if($week[$i]['monthDay'] == $monthDay){ echo 'cpdf-dpm1l-this-day';}?>">
                        <?= $week[$i]['monthDay']; ?>
                    </td>
                <?php endif; ?>

            <?php else: ?>
                <td class="cpdf-dpm1l-no-day ">
                            <span>
                            </span>
                </td>
            <?php endif; ?>
        <?php endfor; ?>

        <?php for ($i = 6; $i <= 7; $i++): ?>
            <?php if (isset($week[$i])):  ?>
                <td class="cpdf-dpm1l-day-weekend <?php if($week[$i]['monthDay'] == $monthDay){ echo 'cpdf-dpm1l-this-day';}?>">
                            <span>
                                <?= $week[$i]['monthDay']; ?>
                            </span>
                </td>
            <?php else: ?>
                <td class="cpdf-dpm1l-no-day ">
                            <span>

                            </span>
                </td>
            <?php endif; ?>
        <?php endfor; ?>

        </tr>
    <?php endforeach; ?>
</table>
