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
 */

?><table class=calendar-pdf-header-table><tr><td class=calendar-pdf-header-table-left><?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?><h1 class=calendar-pdf-header-h1><?= $getParamsCustomize['header'] ?></h1><h2 class=calendar-pdf-header-h2><?= Yii::t('app', 'Business days calendar for {year}. ({country})', [
                            'year' => $dateData['year']['full'],
                            'country' => $countryData['name']
                        ]) ?></h2><?php else: ?><h1 class=calendar-pdf-header-h1><?= Yii::t('app', 'Business days calendar for {year}. ({country})', [
                            'year' => $dateData['year']['full'],
                            'country' => $countryData['name']
                        ]) ?></h1><?php endif; ?><td class=calendar-pdf-header-table-right><h3 class=calendar-pdf-header-h3><a href=https://timesles.com>TIMESLES.COM</a></h3></table><br><table style="width: 100%"><tr><td style="width: 50%"><table class=cpdf-byl1-year><?php
                    $countMonths = 0;
                    $countWeeks = 0;
                    foreach ($calendarByYear['calendar'] as $months) :?><?php $countMonths++; ?><?php if (($countMonths == 1) or ($countMonths == 4) or ($countMonths == 7) or ($countMonths == 10)): ?><tr><?php endif; ?><td class=cpdf-byl1-td-month><table class=cpdf-byl1-month><tr class=cpdf-byl1-month-name-line><td class=cpdf-byl1-month-name-line-td colspan=8><span class="fa fa-calendar"></span> <a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/months/<?= $dateData['year']['current']; ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/"><?= $calendarNameOfMonths[$countMonths]; ?></a><tr class=cpdf-byl1-week><td class=wday-name>#</td><?php for ($i = 1; $i <= 7; $i++): ?><td class=cpdf-byl1-day-name><?= $calendarNameOfDaysInWeek[$i]; ?></td><?php endfor; ?><tr><td class=cpdf-byl1-week-line colspan=8></tr><?php $countWeeks = 0 ?><?php foreach ($months as $key => $week): ?><?php $countWeeks++ ?><tr class=cpdf-byl1-week><td class=cpdf-byp1-day><span><?php if ($countWeeks == 1 && $key > 50): ?><a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['previous'] ?>/<?= $key; ?>/"style="font-size: 10px"><?= $key; ?></a><?php else: ?><a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['current'] ?>/<?= $key; ?>/"style="font-size: 10px"><?= $key; ?></a><?php endif; ?></span></td><?php for ($i = 1; $i <= 5; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                                if (false !== $key): ?><td class="cpdf-byl1-day cpdf-byl1-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class=cpdf-byl1-day><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class=cpdf-byl1-no-day><span></span></td><?php endif; ?><?php endfor; ?><?php for ($i = 6; $i <= 7; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                                if (false !== $key): ?><td class="cpdf-byl1-day cpdf-byl1-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class="cpdf-byl1-day cpdf-byl1-day-weekend"><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class=cpdf-byl1-no-day><span></span></td><?php endif; ?><?php endfor; ?></tr><?php endforeach; ?></table></td><?php if (($countMonths == 3) or ($countMonths == 6) or ($countMonths == 9) or ($countMonths == 12)): ?></tr><?php endif; ?><?php endforeach; ?></table><td style="width: 50%;vertical-align: middle"><?php


                $businessMonths = [
                    '1' => ['name' => $calendarNameOfMonths[1]],
                    '2' => ['name' => $calendarNameOfMonths[2]],
                    '3' => ['name' => $calendarNameOfMonths[3]],
                    '4' => ['name' => $calendarNameOfMonths[4]],
                    '5' => ['name' => $calendarNameOfMonths[5]],
                    '6' => ['name' => $calendarNameOfMonths[6]],
                    '7' => ['name' => $calendarNameOfMonths[7]],
                    '8' => ['name' => $calendarNameOfMonths[8]],
                    '9' => ['name' => $calendarNameOfMonths[9]],
                    '10' => ['name' => $calendarNameOfMonths[10]],
                    '11' => ['name' => $calendarNameOfMonths[11]],
                    '12' => ['name' => $calendarNameOfMonths[12]],
                ];


                $quarters = [
                    '1' => ['name' => '1 ' . Yii::t('app', 'quarter'),
                        'var' => $calendarByYear['quarter'][1]],
                    '2' => ['name' => '2 ' . Yii::t('app', 'quarter'),
                        'var' => $calendarByYear['quarter'][2]],
                    '3' => ['name' => '1 ' . Yii::t('app', 'half year'),
                        'var' => $calendarByYear['halfYear'][1]],
                    '4' => ['name' => '3 ' . Yii::t('app', 'quarter'),
                        'var' => $calendarByYear['quarter'][3]],
                    '5' => ['name' => '4 ' . Yii::t('app', 'quarter'),
                        'var' => $calendarByYear['quarter'][4]],
                    '6' => ['name' => '2 ' . Yii::t('app', 'half year'),
                        'var' => $calendarByYear['halfYear'][2]],
                    '7' => ['name' => '1 ' . Yii::t('app', 'year'),
                        'var' => $calendarByYear['businessYear'][$dateData['year']['current']]],
                ]
                ?><table style="width: 100%; font-size: 12px;"><tr class=business-gray><td class=cpdf-byl1-td rowspan=2><?= Yii::t('app', 'Period') ?><td class=cpdf-byl1-td colspan=3 style="text-align: center"><?= Yii::t('app', 'Amount of days') ?><td class=cpdf-byl1-td colspan=3 style="text-align: center"><?= Yii::t('app', 'Working hours per week') ?><tr class=business-gray><td class=cpdf-byl1-td><?= Yii::t('app', 'Calendar days') ?><td class=cpdf-byl1-td><?= Yii::t('app', 'Working days') ?><td class=cpdf-byl1-td><?= Yii::t('app', 'Days off') ?><td class=cpdf-byl1-td><?= Yii::t('app', '40 hour week') ?><td class=cpdf-byl1-td><?= Yii::t('app', '36 hour week') ?><td class=cpdf-byl1-td><?= Yii::t('app', '24 hour week') ?></tr><?php foreach (range(1, 12) as $oneMonth): ?><tr class="<?= (($oneMonth % 2) == 0) ? 'business-gray' : 'business-light' ?>"><td class=cpdf-byl1-td style="border-top: 1px solid #9c9c9c"><?= $calendarNameOfMonths[$oneMonth] ?><td class=cpdf-byl1-td><?= $calendarByYear['daysInMonth'][$oneMonth] ?><td class=cpdf-byl1-td><?= $calendarByYear['workingDays'][$oneMonth] ?><td class=cpdf-byl1-td><?= $calendarByYear['allHolidays'][$oneMonth] ?><td class=cpdf-byl1-td><?= $calendarByYear['hours40'][$oneMonth] ?><td class=cpdf-byl1-td><?= $calendarByYear['hours36'][$oneMonth] ?><td class=cpdf-byl1-td><?= $calendarByYear['hours24'][$oneMonth] ?></tr><?php endforeach ?><?php $countQuarters = 0; ?><?php foreach ($quarters as $one): ?><?php $countQuarters++ ?><tr class="<?= (($countQuarters % 2) == 0) ? 'business-gray' : 'business-light' ?>"><td class=cpdf-byl1-td style="border-top: 1px solid #9c9c9c"><?= $one['name'] ?><td class=cpdf-byl1-td><?= $one['var']['days'] ?><td class=cpdf-byl1-td><?= $one['var']['workingDays'] ?><td class=cpdf-byl1-td><?= $one['var']['allHolidays'] ?><td class=cpdf-byl1-td><?= $one['var']['hours40'] ?><td class=cpdf-byl1-td><?= $one['var']['hours36'] ?><td class=cpdf-byl1-td><?= $one['var']['hours24'] ?></tr><?php endforeach ?></table><br><table><tr><td style="border: 1px solid #9c9c9c; padding: 5px"><table class=cpdf-yp1-holidays-table><tr><td><table class=cpdf-yp1-holidays-table-inside><?php
                                            $count = 0;
                                            $countHolidays = count($holidaysData);
                                            $countHolidays = ($countHolidays > 20 ? 20 : $countHolidays);
                                            $countHolidaysHalf = ceil($countHolidays / 2);

                                            for ($i = $count; $i < $countHolidaysHalf; $i++) :
                                                $dateFormat = new \DateTime($holidaysData[$i]['date']);
                                                ?><tr><td class=cpdf-yp1-holidays-name><?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?><td class=cpdf-yp1-holidays-rounded-mark><td class=cpdf-yp1-holidays-name><?= $holidaysData[$i]['name']; ?></tr><?php endfor; ?></table><td><table class=cpdf-yp1-holidays-table-inside><?php
                                            $count = $countHolidaysHalf;

                                            for ($i = $count; $i < $countHolidays; $i++) :
                                                $dateFormat = new \DateTime($holidaysData[$i]['date']);
                                                ?><tr><td class=cpdf-yp1-holidays-name><?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?><td class=cpdf-yp1-holidays-rounded-mark><td class=cpdf-yp1-holidays-name><?= $holidaysData[$i]['name']; ?></tr><?php endfor; ?></table></table></table></table><?php /**
 *
 * <table class="cpdf-byp1-table">
 * <tr class="business-gray">
 * <td class="cpdf-byp1-left">
 * <?= Yii::t('app', 'Calendar days') ?>**<td class=cpdf-byp1-right>*<?= $calendarByYear['daysInMonth'][$countMonths] ?>*</td>**<tr class=business-light>*<td class=cpdf-byp1-left>*<?= Yii::t('app', 'Working days') ?>*</td>*<td class=cpdf-byp1-right>*<?= $calendarByYear['workingDays'][$countMonths] ?>*</td>*</tr>*<tr class=business-gray>*<td class=cpdf-byp1-left>*<?= Yii::t('app', 'Days off') ?>*</td>*<td class=cpdf-byp1-right>*<?= $calendarByYear['allHolidays'][$countMonths] ?>*</td>*</tr>*<tr class=business-light>*<td class=cpdf-byp1-left>*<?= Yii::t('app', '40 hour week') ?>*</td>*<td class=cpdf-byp1-right>*<?= $calendarByYear['hours40'][$countMonths] ?>*</td>*</tr>*<tr class=business-gray>*<td class=cpdf-byp1-left>*<?= Yii::t('app', '36 hour week') ?>*</td>*<td class=cpdf-byp1-right>*<?= $calendarByYear['hours36'][$countMonths] ?>*</td>*</tr>*<tr class=business-light>*<td class=cpdf-byp1-left>*<?= Yii::t('app', '24 hour week') ?>*</td>*<td class=cpdf-byp1-right>*<?= $calendarByYear['hours24'][$countMonths] ?>*</td>*</tr>**/ ?>