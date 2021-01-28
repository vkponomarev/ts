<?php

namespace common\components\calendar;

use common\components\tools\SunCalc;

class CalendarByMoonMonths
{

    public function calendar($date, $cityData)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца
        // $calendar[месяц][неделя][день недели] = день месяца
        // Настройки для полного года
        //(new \common\components\dump\Dump())->printR($year);

        $startOfCalendar = new \DateTime($date['year'] . '-' . $date['month'] . '-01');

        $calendar = array();
        if ($date['month'] == '01'){
            $startOfCalendarMoon = new \DateTime(str_pad($date['year'] -1, 4, '0', STR_PAD_LEFT) . '-12-01');
            $startOfCalendarMoonDay = new \DateTime(str_pad($date['year'] -1, 4, '0', STR_PAD_LEFT) . '-12-01');

        } else {
            $startOfCalendarMoon = new \DateTime($date['year'] . '-' . str_pad($date['month'] -1, 2, '0', STR_PAD_LEFT) . '-01');
            $startOfCalendarMoonDay = new \DateTime($date['year'] . '-' . str_pad($date['month'] -1, 2, '0', STR_PAD_LEFT) . '-01');
        }

        $februaryDays = ($startOfCalendar->format('L') ? 29 : 28);

        if ($date['month'] == '12'){
            $endOfCalendarMoon = new \DateTime(str_pad($date['year'] +1, 4, '0', STR_PAD_LEFT) . '-02-' . $februaryDays);

        } elseif ($date['month'] == '11'){
            $endOfCalendarMoon = new \DateTime(str_pad($date['year'] +1, 4, '0', STR_PAD_LEFT) . '-01-31');
        } else {
            $endOfCalendarMoon = new \DateTime($date['year'] . '-' . str_pad($date['month'] +2, 2, '0', STR_PAD_LEFT) . '-01-31');
        }

        $endOfCalendarMoonFormatted = $endOfCalendarMoon->format('Y-m-d');


        $eachDay = $startOfCalendar;
        $eachDayMoon = $startOfCalendarMoon;
        $eachDayMoonDay = $startOfCalendarMoonDay;

        $countDays = 0;

        $moonPhaseDayBefore = 0;
        $moonDaysStart = 0;
        $moonDayCount = 0;
        $moonDayPass = 0;

        //$moonCalc = new SunCalc(new \DateTime(), 55.75, 37.61);
        //$moonPhaseDayBefore = $moonCalc->getMoonIllumination()['phase'];
        //(new \common\components\dump\Dump())->printR(($moonPhaseDayBefore));die;


        // Нам нужно расчитать в какие дни у нас выпадают эти числа.
        // Новолуние 0
        // Возрастающая луна 0.25 - 0.5
        // Убывающая луна 0.5 - 0.75
        // Полнолуние 0.5

        // Если сейчас меньше чем 0.25 и завтра больше чем 0.25
        // то сегодня начало возрастающей луны

        // Если сейчас меньше чем 0.25 и завтра больше чем 0.25
        // то сегодня начало возрастающей луны

        $growingMoonCount = 0;
        $fullMoonCount = 0;
        $waningMoonCount = 0;

        $dateDayBefore = 0;
        /*$growingMoonStart = array();
        $growingMoonEnd = array();

        $waningMoonStart = array();
        $waningMoonEnd = array();
        $fullMoon = array();

        $moonPhaseTest = array();
        $dateTest = array();*/

        $count = 0;
        //Тест Фаз луны для москвы каждую минуту.
        /*do {
            $count++;
            $moonCalc = new SunCalc(new \DateTime($eachDayMoon->format('Y-m-d H:i:s')), 55.75, 37.61);
            //(new \common\components\dump\Dump())->printR($eachDayMoon->format('Y-m-d') . ' 00:01:01');die;
            $moonPhaseToday = $moonCalc->getMoonIllumination()['phase'];


            $eachDayMoon->modify('+1 minute');
            $moonPhaseTest[$count]['time'] = $eachDayMoon->format('Y-m-d H:i:s');
            $moonPhaseTest[$count]['phase'] = $moonCalc->getMoonIllumination()['phase'];
            $dateTest[] = $eachDayMoon->format('Y-m-d H:i:s');
        } while ($eachDayMoon->format('Y-m-d') <= $endOfCalendarMoonTest->format('Y-m-d'));
            (new \common\components\dump\Dump())->printR($moonPhaseTest);die;
        */

        /*
        $waxingCrescentStart = 0;           // Растущий полумесяц начало
        $waxingCrescentEnd = 0;             // Растущий полумесяц конец
        $waningCrescentStart = 0;           // Убывающий полумесяц начало
        $waningCrescentEnd = 0;             // Убывающий полумесяц конец
        $newMoon = 0;                       // Новолуние
        $moonFirstQuarter = 0;              // Первая четверть
        $growingMoonStart = 0;              // Растущая луна начало
        $growingMoonEnd = 0;                // Растущая луна конец
        $fullMoon = 0;                      // Полнолуние
        $waningMoonStart = 0;               // Убывающая луна начало
        $waningMoonEnd = 0;                 // Убывающая луна конец
        $moonThirdQuarter = 0;              // Третья четверть
        */

        $waxingCrescentStart = array();           // Растущий полумесяц начало
        $waxingCrescentEnd = array();             // Растущий полумесяц конец
        $waningCrescentStart = array();           // Убывающий полумесяц начало
        $waningCrescentEnd = array();             // Убывающий полумесяц конец
        $newMoon = array();                       // Новолуние
        $moonFirstQuarter = array();              // Первая четверть
        $growingMoonStart = array();              // Растущая луна начало
        $growingMoonEnd = array();                // Растущая луна конец
        $fullMoon = array();                      // Полнолуние
        $waningMoonStart = array();               // Убывающая луна начало
        $waningMoonEnd = array();                 // Убывающая луна конец
        $moonThirdQuarter = array();              // Третья четверть

        $moonMonth = array();
        $moonMonthCount = 0;

        $moonPositions = array();
        //(new \common\components\dump\Dump())->printR($cityData['latitude']);
        //(new \common\components\dump\Dump())->printR($cityData['longitude']);

        $count = 0;
        do {
            $moonDayCount++;
            $count++;
            $moonCalc = new SunCalc(new \DateTime($eachDayMoon->format('Y-m-d') . ' 00:00:00'), $cityData['latitude'], $cityData['longitude']);
            //(new \common\components\dump\Dump())->printR($eachDayMoon->format('Y-m-d') . ' 00:01:01');die;

            $moonPhaseToday = $moonCalc->getMoonIllumination()['phase'];

            if ($moonPhaseDayBefore) {

                $dateDayBeforeMinusOne = (new \DateTime($dateDayBefore))->modify('-1 day')->format('Y-m-d');
                $dateDayBeforePlusOne = (new \DateTime($dateDayBefore))->modify('+1 day')->format('Y-m-d');

                // Отмечаем все даты возрастающей и убвающей луны
                // Возрастающий полумесяц 0 - 0.25
                if ($moonPhaseToday >= 0 && $moonPhaseToday <= 0.25) {
                    $waxingCrescent[$dateDayBefore] = 1;
                }
                // Возрастающая луна 0.25 - 0.5
                if ($moonPhaseToday >= 0.25 && $moonPhaseToday <= 0.5) {
                    $waxingMoon[$dateDayBefore] = 1;
                }
                // Убывающая луна 0.5 - 0.75
                if ($moonPhaseToday >= 0.5 && $moonPhaseToday <= 0.75) {
                    $waningMoon[$dateDayBefore] = 1;
                }
                // Убывающий полумесяц 0.75 - 1
                if ($moonPhaseToday >= 0.75 && $moonPhaseToday <= 1) {
                    $waningCrescent[$dateDayBefore] = 1;
                }

                if (($moonPhaseDayBefore > 0.8 && $moonPhaseDayBefore <= 0.999) && ($moonPhaseToday > 0 && $moonPhaseToday < 0.3)) {
                    //$newMoon[$count] = $dateDayBefore;
                    $newMoon[$dateDayBefore] = 1;
                    $waxingCrescentStart[$dateDayBeforePlusOne] = 1;
                    $waningCrescentEnd[$dateDayBeforeMinusOne] = 1;
                }

                if ($moonPhaseDayBefore < 0.25 && $moonPhaseToday > 0.25) {
                    $growingMoonCount++;
                    //$moonFirstQuarter[$count] = $dateDayBefore;
                    //$growingMoonStart[$count] = (new \DateTime($dateDayBefore))->modify('+1 day')->format('Y-m-d');
                    $moonFirstQuarter[$dateDayBefore] = 1;
                    $waxingCrescentEnd[$dateDayBeforeMinusOne] = 1;
                    $growingMoonStart[$dateDayBeforePlusOne] = 1;
                }

                if ($moonPhaseDayBefore < 0.5 && $moonPhaseToday > 0.5) {
                    $fullMoonCount++;

                    $growingMoonEnd[$dateDayBeforeMinusOne] = 1;
                    $waningMoonStart[$dateDayBeforePlusOne] = 1;
                    $fullMoon[$dateDayBefore] = 1;

                }

                if ($moonPhaseDayBefore < 0.75 && $moonPhaseToday > 0.75) {
                    $waningMoonCount++;

                    //$moonThirdQuarter[$count] = $dateDayBefore;
                    //$waningMoonEnd[$count] = (new \DateTime($dateDayBefore))->modify('-1 day')->format('Y-m-d');
                    $moonThirdQuarter[$dateDayBefore] = 1;
                    $waningMoonEnd[$dateDayBeforeMinusOne] = 1;
                    $waningCrescentStart[$dateDayBeforePlusOne] = 1;

                }

            }

            if ($moonDayCount > 0) {
                $moonDayCount++;
            }
            if ($moonDayPass) {
                $moonDayPass = 0;
            } else {
                if ($moonPhaseDayBefore) {
                    if ($moonPhaseDayBefore >= 0.96) {
                        $moonDayCount = 1;
                        $moonDayPass = 1;
                    }

                }
            }

            if ($moonDayCount == 1){
                $moonMonthCount++;

                //$moonMonth[$moonMonthCount-1]['end'] = $dateDayBefore;
                //$moonMonth[$moonMonthCount]['start'] = $eachDayMoon->format('Y-m-d');


                /*$moonPositions[$moonMonth] = [
                    'newMoon' => $newMoonPositions,
                    'moonFirstQuarter' => $moonFirstQuarterPositions,
                    'growingMoonStart' => $growingMoonStartPositions,
                    'growingMoonEnd' => $growingMoonEndPositions,
                    'fullMoon' => $fullMoonPositions,
                    'waningMoonStart' => $waningMoonStartPositions,
                    'waningMoonEnd' => $waningMoonEndPositions,
                    'moonThirdQuarter' => $moonThirdQuarterPositions,
                    'waxingCrescentStart' => $waxingCrescentStartPositions,
                    'waxingCrescentEnd' => $waxingCrescentEndPositions,
                    'waningCrescentStart' => $waningCrescentStartPositions,
                    'waningCrescentEnd' => $waningCrescentEndPositions,
                ];*/
            };

            $moonCalendar[$eachDayMoon->format('Y-m-d')] = [
                'moonDay' => $moonDayCount,
                'moonPhase' => $moonCalc->getMoonIllumination(),
                /*'newMoon' => $newMoon,
                'moonFirstQuarter' => $moonFirstQuarter,
                'growingMoonStart' => $growingMoonStart,
                'growingMoonEnd' => $growingMoonEnd,
                'fullMoon' => $fullMoon,
                'waningMoonStart' => $waningMoonStart,
                'waningMoonEnd' => $waningMoonEnd,
                'moonThirdQuarter' => $moonThirdQuarter,
                'waxingCrescentStart' => $waxingCrescentStart,
                'waxingCrescentEnd' => $waxingCrescentEnd,
                'waningCrescentStart' => $waningCrescentStart,
                'waningCrescentEnd' => $waningCrescentEnd,*/
            ];

            $moonPhaseDayBefore = $moonCalc->getMoonIllumination()['phase'];
            $dateDayBefore = $eachDayMoon->format('Y-m-d');
            $eachDayMoon->modify('+1 day');

        } while ($eachDayMoon->format('Y-m-d') <= $endOfCalendarMoonFormatted);

        $moonDay = array();
        $moonDayCount = 0;


        do {
            $moonDayCount++;
            if (isset($newMoon[$eachDayMoonDay->format('Y-m-d')])){
                $moonDayCount = 1;
            }
            $moonDay[$eachDayMoonDay->format('Y-m-d')] = $moonDayCount;
            $eachDayMoonDay->modify('+1 day');

        } while ($eachDayMoonDay->format('Y-m-d') <= $endOfCalendarMoonFormatted);


        $moonDayCount = 0;
        $countDays = 0;
        do {

            $thisDate = $eachDay->format('Y-m-d');

            $moonDayCount++;
            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = [
                'monthDay' => $eachDay->format('j'),
                'date' => $eachDay->format('Y-m-d'),
                'month' => $eachDay->format('n'),
                'week' => $eachDay->format('W'),
                'moonPhase' => $moonCalendar[$eachDay->format('Y-m-d')]['moonPhase'],
                'moonDay' => $moonDayCount,
                'holiday' => 0,
                'observance' => 0,
                'muslim' => 0,
                'orthodox' => 0,
                'newMoon' => (isset($newMoon[$thisDate]) ? 1 : 0),               // отмечаем дату новолуния
                'fullMoon' => (isset($fullMoon[$thisDate]) ? 1 : 0),             // отмечаем дату полнолуния
                'waningMoon' => (isset($waningMoon[$thisDate]) ? 1 : 0),         // убывающая луна
                'waningCrescent' => (isset($waningCrescent[$thisDate]) ? 1 : 0), // убывающий полумесяц
                'waxingMoon' => (isset($waxingMoon[$thisDate]) ? 1 : 0),         // Возрастающая луна
                'waxingCrescent' => (isset($waxingCrescent[$thisDate]) ? 1 : 0), // Возрастающий полумесяц

            ];
            $eachDay->modify('+1 day');
            $countDays++;

        } while ($eachDay->format('n') == $date['month']);

        $moonMonthCount=0;
        foreach ($newMoon as $key => $one) {
            $moonMonthCount++;

            $moonMonth[$moonMonthCount]['start'] = $key;
            $moonMonth[$moonMonthCount-1]['end'] = (new \DateTime($key))->modify('-1 day')->format('Y-m-d');

        }


        return [
            'calendar' => $calendar,
            'moonMonth' => $moonMonth,
            'moonDay' => $moonDay,
            'moonPhases' => [
                'newMoon' => $newMoon,
                'waxingCrescentStart' => $waxingCrescentStart,
                'waxingCrescentEnd' => $waxingCrescentEnd,
                'moonFirstQuarter' => $moonFirstQuarter,
                'growingMoonStart' => $growingMoonStart,
                'growingMoonEnd' => $growingMoonEnd,
                'fullMoon' => $fullMoon,
                'waningMoonStart' => $waningMoonStart,
                'waningMoonEnd' => $waningMoonEnd,
                'moonThirdQuarter' => $moonThirdQuarter,
                'waningCrescentStart' => $waningCrescentStart,
                'waningCrescentEnd' => $waningCrescentEnd,
            ],

        ];
    }

}

