<?php

/**
 * @var $this frontend\controllers\MainPageController
 * @var $modal frontend\controllers\YoutubeController
 * @var $search frontend\controllers\SearchController
 *
 * @var $yearData common\components\year\YearData
 * @var $calendarByYear common\components\calendar\CalendarByYear
 */


?><table class=calendar-pdf-header-table><tr><td class=calendar-pdf-header-table-left><?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?><h1 class=calendar-pdf-header-h1><?= $getParamsCustomize['header'] ?></h1><h2 class=calendar-pdf-header-h2><?= Yii::t('app', 'Calendar for {month} {year}. ({country})', [
                        'year' => $dateData['year']['full'],
                        'country' => $countryData['name'],
                        'month' => $calendarNameOfMonths[$dateData['month']['numberSimple']]
                    ]) ?></h2><?php else: ?><h1 class=calendar-pdf-header-h1><?= Yii::t('app', 'Calendar for {month} {year}. ({country})', [
                        'year' => $dateData['year']['full'],
                        'country' => $countryData['name'],
                        'month' => $calendarNameOfMonths[$dateData['month']['numberSimple']]
                    ]) ?></h1><?php endif; ?><td class=calendar-pdf-header-table-right><h3 class=calendar-pdf-header-h3><a href=https://timesles.com>TIMESLES.COM</a></h3></table><br><table class=cpdf-mp1-year><?php
    $countMonths = $dateData['month']['numberSimple']-1;
    $countWeeks = 0;
    foreach ($calendarByMonths as $months) :?><?php $countMonths++; ?><tr><td class=cpdf-mp1-td-month><table class=cpdf-mp1-month><tr class=cpdf-mp1-week-day-name><?php for ($i = 1; $i <= 7; $i++): ?><td class=cpdf-mp1-day-name><?= $calendarNameOfDaysInWeek[$i]; ?></td><?php endfor; ?><tr><td class=cpdf-mp1-week-line colspan=7></tr><?php foreach ($months as $week): ?><tr class=cpdf-mp1-week><?php for ($i = 1; $i <= 5; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                if (false !== $key): ?><td class="cpdf-mp1-day cpdf-mp1-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class=cpdf-mp1-day><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class="cpdf-mp1-day cpdf-mp1-no-day"><span></span></td><?php endif; ?><?php endfor; ?><?php for ($i = 6; $i <= 7; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                if (false !== $key): ?><td class="cpdf-mp1-day cpdf-mp1-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class="cpdf-mp1-day cpdf-mp1-day-weekend"><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class="cpdf-mp1-day cpdf-mp1-no-day"><span></span></td><?php endif; ?><?php endfor; ?></tr><?php endforeach; ?></table></tr><?php endforeach; ?></table><div class=cpdf-mp1-holidays-table-border><table class=cpdf-mp1-holidays-table><tr><td><table class=cpdf-mp1-holidays-table-inside><?php
                    $count = 0;
                    $countHolidays = count($holidaysData);
                    $countHolidays = ($countHolidays > 20 ? 20 : $countHolidays);
                    $countHolidaysHalf = ceil($countHolidays / 2);

                    for ($i = $count; $i < $countHolidaysHalf; $i++) :
                        $dateFormat = new \DateTime($holidaysData[$i]['date']);
                        ?><tr><td class=cpdf-mp1-holidays-name><?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?><td class=cpdf-mp1-holidays-rounded-mark><td class=cpdf-mp1-holidays-name><?= $holidaysData[$i]['name']; ?></tr><?php endfor; ?></table><td><table class=cpdf-mp1-holidays-table-inside><?php
                        $count = $countHolidaysHalf;

                        for ($i = $count; $i < $countHolidays; $i++) :
                        $dateFormat = new \DateTime($holidaysData[$i]['date']);
                        ?><tr><td class=cpdf-mp1-holidays-name><?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?><td class=cpdf-mp1-holidays-rounded-mark><td class=cpdf-mp1-holidays-name><?= $holidaysData[$i]['name']; ?></tr><?php endfor; ?></table></table></div>