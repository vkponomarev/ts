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


?><div style="width: 100%"><table class=calendar-pdf-header-table><tr><td class=calendar-pdf-header-table-left><?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?><h1 class=calendar-pdf-header-h1><?= $getParamsCustomize['header'] ?></h1><h2 class=calendar-pdf-header-h2><?= Yii::t('app', 'Calendar {season} {year}.', [
                            'year' => $dateData['year']['full'],
                            'season' => $pageTextsMessages['seasonOn']
                        ]) ?></h2><?php else: ?><h1 class=calendar-pdf-header-h1><?= Yii::t('app', 'Calendar {season} {year}.', [
                            'year' => $dateData['year']['full'],
                            'season' => $pageTextsMessages['seasonOn']
                        ]) ?></h1><?php endif; ?><td class=calendar-pdf-header-table-right><h3 class=calendar-pdf-header-h3><a href=https://timesles.com>TIMESLES.COM</a></h3></table><br><table class=cpdf-sl1-nh-year><tr><?php
        $countMonths = $calendarBySeasons['calendarStartMonth'] - 1;
        $countWeeks = 0;

        foreach ($calendarBySeasons['calendar'] as $months) :?><?php $countMonths++; ?><td class=cpdf-sl1-nh-td-month><table class=cpdf-sl1-nh-month><tr class=cpdf-sl1-nh-month-name-line><td class=cpdf-sl1-nh-month-name-line-td colspan=7><span class="fa fa-calendar"></span><?php $countMonths = ($countMonths == 13) ? 1 : $countMonths; ?><?php $yearLink = ($countMonths == 12) ? $dateData['year']['previous'] : $dateData['year']['current']; ?><a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/months/<?= $yearLink ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/"><?= $calendarNameOfMonths[$countMonths]; ?></a><tr class=cpdf-sl1-nh-week><?php for ($i = 1; $i <= 7; $i++): ?><td class=cpdf-sl1-nh-day-name><?= $calendarNameOfDaysInWeek[$i]; ?></td><?php endfor; ?><tr><td class=cpdf-sl1-nh-week-line colspan=7></tr><?php foreach ($months as $week): ?><tr class=cpdf-sl1-nh-week><?php for ($i = 1; $i <= 5; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                        if (false !== $key): ?><td class="cpdf-sl1-nh-day cpdf-sl1-nh-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class=cpdf-sl1-nh-day><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class=cpdf-sl1-nh-no-day><span></span></td><?php endif; ?><?php endfor; ?><?php for ($i = 6; $i <= 7; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                        if (false !== $key): ?><td class="cpdf-sl1-nh-day cpdf-sl1-nh-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class=cpdf-sl1-nh-day-weekend><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class=cpdf-sl1-nh-no-day><span></span></td><?php endif; ?><?php endfor; ?></tr><?php endforeach; ?></table></td><?php endforeach; ?></table></div>