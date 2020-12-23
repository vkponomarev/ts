<?php

/**
 * @var $this frontend\controllers\MainPageController
 * @var $modal frontend\controllers\YoutubeController
 * @var $search frontend\controllers\SearchController
 *
 * @var $yearData common\components\year\YearData
 * @var $calendarByYear common\components\calendar\CalendarByYear
 */
?><table class=cpdf-wlm1-month><tr class=cpdf-wlm1-month-name-line><td class=cpdf-wlm1-month-name-line-td colspan=7><span class="fa fa-calendar"></span> <a class=cpdf-wlm1-month-name-a href=/ ><?= $calendarNameOfMonths[$month]; ?></a><tr class=cpdf-wlm1-week><?php for ($i = 1; $i <= 7; $i++): ?><td class=cpdf-wlm1-day-name><?= $calendarNameOfDaysInWeek[$i]; ?></td><?php endfor; ?><tr><td class=cpdf-wlm1-week-line colspan=7></tr><?php $countWeeks = 0; ?><?php foreach ($calendarByYear[$month] as $key => $week): ?><?php if ($key == $weekNumber): ?><tr class=cpdf-wlm1-week-border><?php else: ?><tr class=cpdf-wlm1-week><?php endif;?><?php for ($i = 1; $i <= 5; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysByCountryByYear, 'date'));
                if (false !== $key): ?><td class="cpdf-wlm1-day cpdf-wlm1-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class="cpdf-wlm1-day cpdf-wlm1-day"><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class=cpdf-wlm1-no-day><span></span></td><?php endif; ?><?php endfor; ?><?php for ($i = 6; $i <= 7; $i++): ?><?php if (isset($week[$i])): ?><td class=cpdf-wlm1-day-weekend><span><?= $week[$i]['monthDay']; ?></span></td><?php else: ?><td class=cpdf-wlm1-no-day><span></span></td><?php endif; ?><?php endfor; ?></tr><?php endforeach; ?></table>