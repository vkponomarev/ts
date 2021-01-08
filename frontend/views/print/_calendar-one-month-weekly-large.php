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

<table class="cpdf-wpm1-month">
    <tr class="cpdf-wpm1-month-name-line">
        <td class="cpdf-wpm1-month-name-line-td" colspan="7">
            <span class="fa fa-calendar">
                </span>
            <a href="/" class="cpdf-wpm1-month-name-a">
                <?= $calendarNameOfMonths[$month]; ?>
            </a>
        </td>
    </tr>
    <tr class="cpdf-wpm1-week">

        <?php for ($i = 1; $i <= 7; $i++): ?>
            <td class="cpdf-wpm1-day-name">
                <?= $calendarNameOfDaysInWeek[$i]; ?>
            </td>
        <?php endfor; ?>

    </tr>
    <tr>
        <td class="cpdf-wpm1-week-line" colspan="7">

        </td>
    </tr>
    <?php $countWeeks = 0; ?>
    <?php foreach ($calendarByYear[$month] as $key => $week): ?>

        <?php if ($key == $weekNumber): ?>
            <tr class="cpdf-wpm1-week-border">
        <?php else: ?>
            <tr class="cpdf-wpm1-week">
        <?php endif;?>
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <?php if (isset($week[$i])): ?>

                <?php $key = array_search($week[$i]['date'], array_column($holidaysByCountryByYear, 'date'));
                if (false !== $key): ?>
                    <td class="cpdf-wpm1-day cpdf-wpm1-day-holiday">

                        <?= $week[$i]['monthDay']; ?>
                    </td>
                <?php else: ?>
                    <td class="cpdf-wpm1-day cpdf-wpm1-day">
                        <?= $week[$i]['monthDay']; ?>
                    </td>
                <?php endif; ?>

            <?php else: ?>
                <td class="cpdf-wpm1-no-day">
                            <span>
                            </span>
                </td>
            <?php endif; ?>
        <?php endfor; ?>

        <?php for ($i = 6; $i <= 7; $i++): ?>
            <?php if (isset($week[$i])): ?>
                <td class="cpdf-wpm1-day-weekend">
                            <span>
                                <?= $week[$i]['monthDay']; ?>
                            </span>
                </td>
            <?php else: ?>
                <td class="cpdf-wpm1-no-day">
                            <span>

                            </span>
                </td>
            <?php endif; ?>
        <?php endfor; ?>

        </tr>
    <?php endforeach; ?>
</table>
