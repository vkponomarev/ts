<?php

/**
 * Страница для отрисовки календаря на год для формата PDF PORTRAIT с праздниками и выходными днями.
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


?><div style="width: 100%"><table class=calendar-pdf-header-table><tr><td class=calendar-pdf-header-table-left><?php if (isset($getParamsCustomize['header']) && $getParamsCustomize['header'] <> ''): ?><h1 class=calendar-pdf-header-h1><?= $getParamsCustomize['header'] ?></h1><h2 class=calendar-pdf-header-h2><?= Yii::t('app', 'Business days calendar for {year}. ({country})', [
                            'year' => $dateData['year']['full'],
                            'country' => $countryData['name']
                        ]) ?></h2><?php else: ?><h1 class=calendar-pdf-header-h1><?= Yii::t('app', 'Business days calendar for {year}. ({country})', [
                            'year' => $dateData['year']['full'],
                            'country' => $countryData['name']
                        ]) ?></h1><?php endif; ?><td class=calendar-pdf-header-table-right><h3 class=calendar-pdf-header-h3><a href=https://timesles.com>TIMESLES.COM</a></h3></table><br><table class=cpdf-byp1-year><?php
        $countMonths = 0;
        $countWeeks = 0;
        foreach ($calendarByYear['calendar'] as $months) :?><?php $countMonths++; ?><?php if (($countMonths == 1) or ($countMonths == 4) or ($countMonths == 7) or ($countMonths == 10)): ?><tr><?php endif; ?><td class=cpdf-byp1-td-month><table class=cpdf-byp1-month><tr class=cpdf-byp1-month-name-line><td class=cpdf-byp1-month-name-line-td colspan=8><span class="fa fa-calendar"></span> <a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/business/months/<?= $dateData['year']['current']; ?>-<?= str_pad($countMonths, 2, '0', STR_PAD_LEFT) ?>/"><?= $calendarNameOfMonths[$countMonths]; ?></a><tr class=cpdf-byp1-week><td class=wday-name>#</td><?php for ($i = 1; $i <= 7; $i++): ?><td class=cpdf-byp1-day-name><?= $calendarNameOfDaysInWeek[$i]; ?></td><?php endfor; ?><tr><td class=cpdf-byp1-week-line colspan=8></tr><?php $countWeeks = 0 ?><?php foreach ($months as $key => $week): ?><?php $countWeeks++ ?><tr class=cpdf-byp1-week><td class=cpdf-byp1-day><span><?php if ($countWeeks == 1 && $key > 50): ?><a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['previous'] ?>/<?= $key; ?>/"><?= $key; ?></a><?php else: ?><a href="https://timesles.com/<?= Yii::$app->language ?>/calendar/weeks/<?= $dateData['year']['current'] ?>/<?= $key; ?>/"class=cpdf-byl1-day><?= $key; ?></a><?php endif; ?></span></td><?php for ($i = 1; $i <= 5; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                    if (false !== $key): ?><td class="cpdf-byp1-day cpdf-byp1-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class=cpdf-byp1-day><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class=cpdf-byp1-no-day><span></span></td><?php endif; ?><?php endfor; ?><?php for ($i = 6; $i <= 7; $i++): ?><?php if (isset($week[$i])): ?><?php $key = array_search($week[$i]['date'], array_column($holidaysData, 'date'));
                                    if (false !== $key): ?><td class="cpdf-byp1-day cpdf-byp1-day-holiday"><?= $week[$i]['monthDay']; ?></td><?php else: ?><td class=cpdf-byp1-day-weekend><?= $week[$i]['monthDay']; ?></td><?php endif; ?><?php else: ?><td class=cpdf-byp1-no-day><span></span></td><?php endif; ?><?php endfor; ?></tr><?php endforeach; ?><?php if ($countWeeks <> 6) : ?><?php foreach (range(1, 6 - $countWeeks) as $addWeek): ?><tr class=cpdf-byp1-week><?php foreach (range(1, 7) as $oneDay): ?><td class=cpdf-byp1-no-day><span>&nbsp;</span></td><?php endforeach ?></tr><?php endforeach ?><?php endif; ?></table><table class=cpdf-byp1-table><tr class=business-gray><td class=cpdf-byp1-left><?= Yii::t('app', 'Calendar days') ?><td class=cpdf-byp1-right><?= $calendarByYear['daysInMonth'][$countMonths] ?><tr class=business-light><td class=cpdf-byp1-left><?= Yii::t('app', 'Working days') ?><td class=cpdf-byp1-right><?= $calendarByYear['workingDays'][$countMonths] ?><tr class=business-gray><td class=cpdf-byp1-left><?= Yii::t('app', 'Days off') ?><td class=cpdf-byp1-right><?= $calendarByYear['allHolidays'][$countMonths] ?><tr class=business-light><td class=cpdf-byp1-left><?= Yii::t('app', '40 hour week') ?><td class=cpdf-byp1-right><?= $calendarByYear['hours40'][$countMonths] ?><tr class=business-gray><td class=cpdf-byp1-left><?= Yii::t('app', '36 hour week') ?><td class=cpdf-byp1-right><?= $calendarByYear['hours36'][$countMonths] ?><tr class=business-light><td class=cpdf-byp1-left><?= Yii::t('app', '24 hour week') ?><td class=cpdf-byp1-right><?= $calendarByYear['hours24'][$countMonths] ?></table></td><?php if (($countMonths == 3) or ($countMonths == 6) or ($countMonths == 9) or ($countMonths == 12)): ?></tr><?php endif; ?><?php endforeach; ?></table><?php $quarters = [
        '1' => ['name' => '1 ' . Yii::t('app', 'quarter'),
            'var' => $calendarByYear['quarter'][1]],
        '2' => ['name' => '2 ' . Yii::t('app', 'quarter'),
            'var' => $calendarByYear['quarter'][2]],
        //'3' => ['name' => '1 ' . Yii::t('app', 'half year'),
        //    'var' => $calendarByYear['halfYear'][1]],
        '4' => ['name' => '3 ' . Yii::t('app', 'quarter'),
            'var' => $calendarByYear['quarter'][3]],
        '5' => ['name' => '4 ' . Yii::t('app', 'quarter'),
            'var' => $calendarByYear['quarter'][4]],
        //'6' => ['name' => '2 ' . Yii::t('app', 'half year'),
        //    'var' => $calendarByYear['halfYear'][2]],
        '7' => ['name' => '1 ' . Yii::t('app', 'year'),
            'var' => $calendarByYear['businessYear'][$dateData['year']['current']]],
    ]
    ?><br><div><table style="width: 100%"><tr><?php foreach ($quarters as $one): ?><td><?= $one['name'] ?><table class=cpdf-byp1-table><tr class=business-gray><td class=cpdf-byp1-left style="font-size: 10px"><?= Yii::t('app', 'Calendar days') ?><td class=cpdf-byp1-right style="font-size: 10px"><?= $one['var']['days'] ?><tr class=business-light><td class=cpdf-byp1-left style="font-size: 10px"><?= Yii::t('app', 'Working days') ?><td class=cpdf-byp1-right style="font-size: 10px"><?= $one['var']['workingDays'] ?><tr class=business-gray><td class=cpdf-byp1-left style="font-size: 10px"><?= Yii::t('app', 'Days off') ?><td class=cpdf-byp1-right style="font-size: 10px"><?= $one['var']['allHolidays'] ?><tr class=business-light><td class=cpdf-byp1-left style="font-size: 10px"><?= Yii::t('app', '40 hour week') ?><td class=cpdf-byp1-right style="font-size: 10px"><?= $one['var']['hours40'] ?><tr class=business-gray><td class=cpdf-byp1-left style="font-size: 10px"><?= Yii::t('app', '36 hour week') ?><td class=cpdf-byp1-right style="font-size: 10px"><?= $one['var']['hours36'] ?><tr class=business-light><td class=cpdf-byp1-left style="font-size: 10px"><?= Yii::t('app', '24 hour week') ?><td class=cpdf-byp1-right style="font-size: 10px"><?= $one['var']['hours24'] ?></table></td><?php endforeach ?></table></div><?php /**
     * <div class="cpdf-byp1-holidays-table-border">
     *
     * <table class="cpdf-byp1-holidays-table">
     * <tr>
     * <td>
     * <table class="cpdf-byp1-holidays-table-inside">
     * <?php
     * $count = 0;
     * $countHolidays = count($holidaysData);
     * $countHolidays = ($countHolidays > 20 ? 20 : $countHolidays);
     * $countHolidaysHalf = ceil($countHolidays / 2);
     *
     * for ($i = $count; $i < $countHolidaysHalf; $i++) :
     * $dateFormat = new \DateTime($holidaysData[$i]['date']);
     * ?>*<tr>*<td class=cpdf-byp1-holidays-name>*<?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>*</td>*<td class=cpdf-byp1-holidays-rounded-mark>*</td>*<td class=cpdf-byp1-holidays-name>*<?= $holidaysData[$i]['name']; ?>*</td>* * *</tr>*<?php endfor; ?>*** * *<td>*<table class=cpdf-byp1-holidays-table-inside>*<?php
     * $count = $countHolidaysHalf;
     *
     * for ($i = $count; $i < $countHolidays; $i++) :
     * $dateFormat = new \DateTime($holidaysData[$i]['date']);
     * ?>*<tr>*<td class=cpdf-byp1-holidays-name>*<?= Yii::$app->formatter->asDate($dateFormat, 'medium'); ?>*</td>*<td class=cpdf-byp1-holidays-rounded-mark>*</td>*<td class=cpdf-byp1-holidays-name>*<?= $holidaysData[$i]['name']; ?>*</td>*</tr>*<?php endfor; ?>*</table>*</td>***</div>*/ ?>