<?php

/**
 * @var $this frontend\controllers\MainPageController
 * @var $modal frontend\controllers\YoutubeController
 * @var $search frontend\controllers\SearchController
 *
 * @var $yearData common\components\year\YearData
 * @var $calendarByYear common\components\calendar\CalendarByYear
 */

?><table class=calendar-pdf-header-table><tr><td class=calendar-pdf-header-table-left><?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?><h1 class=calendar-pdf-header-h1><?= $getParamsCustomize['header'] ?></h1><h2 class=calendar-pdf-header-h2><?= Yii::t('app', 'Calendar weekly for the {week} week of {year}', [
                        'year' => $dateData['year']['full'],
                        'week' => $weekURL['url']
                    ]) ?></h2><?php else: ?><h1 class=calendar-pdf-header-h1><?= Yii::t('app', 'Calendar weekly for the {week} week of {year}', [
                        'year' => $dateData['year']['full'],
                        'week' => $weekURL['url']
                    ]) ?></h1><?php endif; ?><td class=calendar-pdf-header-table-right><h3 class=calendar-pdf-header-h3><a href=https://timesles.com>timesles.com</a></h3></table><br><?php for ($z = 1; $z <= 2; $z++): ?><?php
    $month = $calendarByWeek[str_pad($z, 2, '0', STR_PAD_LEFT)][3]['month'];
    $weekNumber = str_pad($z, 2, '0', STR_PAD_LEFT);

    ?><?php //foreach ($calendarByWeek as $week): ?><table style="width: 100%"><tr><td style="/*border: 1px solid black;*/ text-align: left"><table style="width: 100%;"><tr><td style="/*border: 1px solid red;*/ text-align: left;height: 660px;width: 50%;vertical-align: top;padding-right: 20px;"><table style="width: 100%;"><?php for ($c = 1; $c <= 4; $c++): ?><tr style="width: 100%;"><td style="text-align: left;padding:10px; vertical-align: top; border-top: 2px solid black;font-size: 20px; color:#868686"><?php if (isset($calendarByWeek[$weekNumber][$c])): ?><?= $calendarByWeek[$weekNumber][$c]['monthDay']; ?><br><?= $calendarNameOfDaysInWeek[$c]; ?><?php endif; ?><td style="width: 450px;text-align: left; border-top: 2px solid black;"><table style="width: 100%;"><?php for ($a = 0; $a <= 10; $a++): ?><?php if ($a == 10): ?><tr><td class=cpdf-wl1-day-line-no-line>&nbsp;</tr><?php else: ?><tr><td class=cpdf-wl1-day-line>&nbsp;</tr><?php endif; ?><?php endfor; ?></table></tr><?php endfor; ?></table><td style="/*border: 1px solid red;*/ width: 50%;vertical-align: top;padding-left: 20px;"><table style="width: 100%;"><?php for ($c = 5; $c <= 7; $c++): ?><tr style="width: 100%;"><td style="text-align: left;padding:10px; vertical-align: top; border-top: 2px solid black;font-size: 20px; color:#868686"><?php if (isset($calendarByWeek[$weekNumber][$c])): ?><?= $calendarByWeek[$weekNumber][$c]['monthDay']; ?><br><?= $calendarNameOfDaysInWeek[$c]; ?><?php endif; ?><td style="width: 450px;text-align: left; border-top: 2px solid black;"><table style="width: 100%;"><?php for ($a = 0; $a <= 10; $a++): ?><?php if ($a == 10): ?><tr><td class=cpdf-wl1-day-line-no-line>&nbsp;</tr><?php else: ?><tr><td class=cpdf-wl1-day-line>&nbsp;</tr><?php endif; ?><?php endfor; ?></table></tr><?php endfor; ?><tr><td class=cpdf-wl1-calendar-month colspan=2></table></table></table><?php //endforeach; ?><?php endfor; ?>