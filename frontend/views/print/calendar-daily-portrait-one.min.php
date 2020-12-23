<?php

/**
 * @var $this frontend\controllers\MainPageController
 * @var $modal frontend\controllers\YoutubeController
 * @var $search frontend\controllers\SearchController
 *
 * @var $yearData common\components\year\YearData
 * @var $calendarByYear common\components\calendar\CalendarByYear
 */
ini_set("pcre.backtrack_limit", "10000000");
?><?php


?><?php foreach ($calendarByDays as $day): ?><?php

    $month = $day['month'];
    $weekDay = (int)$day['weekDay'];

    ?><table class=calendar-pdf-header-table><tr><td style="border-bottom: 1px solid black; text-align: left; padding-bottom: 10px"class=calendar-pdf-header-table-left><?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?><h1 class=calendar-pdf-header-h1><?= $getParamsCustomize['header'] ?></h1><h2 class=calendar-pdf-header-h2><?= $calendarNameOfDaysInWeek['large'][$weekDay] ?>&nbsp;<?= Yii::$app->formatter->asDate($day['date'], 'd MMMM') ?></h2><?php else: ?><h1 class=calendar-pdf-header-h1><?= $calendarNameOfDaysInWeek['large'][$weekDay] ?></h1><h2 class=calendar-pdf-header-h2><?= Yii::$app->formatter->asDate($day['date'], 'd MMMM'); ?></h2><?php endif; ?><?php

                ?><td style="border-bottom: 1px solid black; text-align: right"class=calendar-pdf-header-table-right><h3 class=calendar-pdf-header-h3><a href=https://timesles.com>timesles.com</a></h3></table><table style="width: 100%;"><tr><td style="/*border: 1px solid black;*/ text-align: left"><table style="width: 100%;"><tr><td style="/*border: 1px solid red;*/ text-align: left;height: 1350px;width: 650px;vertical-align: top;padding-right: 20px;"><table style="width: 100%;"><?php for ($c = 6; $c <= 23; $c++): ?><tr style="width: 100%;"><td style="text-align: left;padding:2px; font-size: 15px; color:#868686; vertical-align: middle; height:74px;
 border-bottom: 1px solid black;"><?= str_pad($c, 2, '0', STR_PAD_LEFT) . ':00';?></tr><?php endfor; ?></table><td style="/*border: 1px solid red;*/ width: 250px;vertical-align: top;padding-left: 20px;"><table style="width: 100%;"><?php for ($c = 6; $c <= 19; $c++): ?><tr style="width: 100%;"><td style="text-align: left;padding:2px; font-size: 15px; color:#868686; vertical-align: middle; height:74px;
 border-bottom: 1px solid black; width: 280px;"></tr><?php endfor; ?><tr><td class=cpdf-dp1-calendar-month colspan=2><br><?php

                                        echo $this->render('/print/_calendar-one-month-daily-large', [

                                            'yearData' => $yearData,
                                            'calendarByYear' => $calendarByYear,
                                            'calendarByWeek' => $calendarByWeek,
                                            'calendarNameOfMonths' => $calendarNameOfMonths,
                                            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                                            'holidaysByCountryByYear' => $holidaysByCountryByYear,
                                            'month' => $month,
                                            'monthDay' => $day['monthDay'],

                                        ])
                                        ?></table></table><br></table><?php endforeach; ?>