<?php

/**
 * @var $this frontend\controllers\MainPageController
 * @var $modal frontend\controllers\YoutubeController
 * @var $search frontend\controllers\SearchController
 *
 * @var $yearData common\components\year\YearData
 * @var $calendarByYear common\components\calendar\CalendarByYear
 */


?><table class=calendar-pdf-header-table><tr><td class=calendar-pdf-header-table-left><?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?><h1 class=calendar-pdf-header-h1><?= $getParamsCustomize['header'] ?></h1><h2 class=calendar-pdf-header-h2><?= Yii::t('app', 'Календарь на 2020 год') ?></h2><?php else: ?><h1 class=calendar-pdf-header-h1><?= Yii::t('app', 'Календарь на 2020 год') ?></h1><?php endif; ?><td class=calendar-pdf-header-table-right><h3 class=calendar-pdf-header-h3><a href=https://timesles.com>timesles.com</a></h3></table><br><table class=cpdf-mp1-year><?php
    $countMonths = 0;
    $countWeeks = 0;
    foreach ($calendarByYear as $months) :?><?php $countMonths++; ?><tr><td class=cpdf-mp1-td-month><table class=cpdf-mp1-month><tr class=cpdf-mp1-month-name-line><td class=cpdf-mp1-month-name-line-td colspan=7><span class="fa fa-calendar"></span> <a href=/ class=cpdf-mp1-month-name-a><?= $calendarNameOfMonths[$countMonths] . ' 2020'; ?></a><tr class=cpdf-mp1-week-day-name><?php for ($i = 1; $i <= 7; $i++): ?><td class=cpdf-mp1-day-name><?= $calendarNameOfDaysInWeek[$i]; ?></td><?php endfor; ?></tr><?php foreach ($months as $week): ?><tr class=cpdf-mp1-week><?php for ($i = 1; $i <= 5; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysByCountryByYear, 'date'));
                                    if (false !== $key): ?><td class="cpdf-mp1-day cpdf-mp1-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class="cpdf-mp1-day cpdf-mp1-day"><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class="cpdf-mp1-day cpdf-mp1-no-day"><span></span></td><?php endif; ?><?php endfor; ?><?php for ($i = 6; $i <= 7; $i++): ?><?php if (isset($week[$i])): ?><td class="cpdf-mp1-day cpdf-mp1-day-weekend"><span><?= $week[$i]['monthDay']; ?></span></td><?php else: ?><td class="cpdf-mp1-day cpdf-mp1-no-day"><span></span></td><?php endif; ?><?php endfor; ?></tr><?php endforeach; ?></table></tr><?php endforeach; ?></table><div class=cpdf-mp1-holidays-table-border><table class=cpdf-mp1-holidays-table><tr><td><table class=cpdf-mp1-holidays-table-inside><?php
                    $count = 0;
                    $countHolidays = count($holidaysByCountryByYear);
                    $countHolidaysHalf = ceil($countHolidays / 2);

                    for ($i = $count; $i < $countHolidaysHalf; $i++) :
                        $dateFormat = new \DateTime($holidaysByCountryByYear[$i]['date']);
                        ?><tr><td class=cpdf-mp1-holidays-name><?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?><td class=cpdf-mp1-holidays-rounded-mark><td class=cpdf-mp1-holidays-name><?= $holidaysByCountryByYear[$i]['holidays_name']; ?></tr><?php endfor; ?></table><td><table class=cpdf-mp1-holidays-table-inside><?php
                    $count = $countHolidaysHalf;

                    for ($i = $count; $i < $countHolidays; $i++) :
                        $dateFormat = new \DateTime($holidaysByCountryByYear[$i]['date']);
                        ?><tr><td class=cpdf-mp1-holidays-name><?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?><td class=cpdf-mp1-holidays-rounded-mark><td class=cpdf-mp1-holidays-name><?= $holidaysByCountryByYear[$i]['holidays_name']; ?></tr><?php endfor; ?></table></table></div>