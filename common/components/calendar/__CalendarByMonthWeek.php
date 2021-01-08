<?php

namespace common\components\calendar;

class CalendarByMonthWeek
{

    public function calendar($year, $week)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца
        // $calendar[месяц][неделя][день недели] = день месяца
        // Настройки для полного года

        $startDate = '2020-02-02';
        $endDate = '2020-05-02';

        // Как нам узнать по неделе какой сейчас месяц

        //$startOfCalendar = new \DateTime('2020-01-01');
        $calendar = array();

        $startOfCalendar = new \DateTime($year . '-01-01');
        $startOfCalendar2 = new \DateTime($year-1 . '-12-31');

        $daysInYear = $startOfCalendar->format('L') ? 366 : 365;

        $eachDay = $startOfCalendar;

        $countDays = 0;

        /**
         * $calendar[месяц][неделя][день недели] =
         * [
         * 'monthDay' => $monthDay,
         * 'holiday' => 1 - 0,
         * 'observance' => 1 - 0,
         * 'muslim' => 1 - 0,
         * 'orthodox' => 1 - 0,
         * ]
         */

        do {
            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = [
                'monthDay' => $eachDay->format('j'),
                'date' => $eachDay->format('Y-m-d'),
                'month' => $eachDay->format('n'),
                'monthWeek' => $eachDay->format('W'),
                'holiday' => 0,
                'observance' => 0,
                'muslim' => 0,
                'orthodox' => 0,
            ];
            $eachDay->modify('+1 day');
            $countDays++;

        } while ($countDays < $daysInYear);


        /**
         * Создаем массив из недель
         */

        /**
         * $weeks[порядковая неделя][день недели][ =
         * [
         * 'monthDay' => $startOfCalendar2->format('j'),
         * 'date' => $startOfCalendar2->format('Y-m-d'),
         * 'observance' => 1 - 0,
         * 'muslim' => 1 - 0,
         * 'orthodox' => 1 - 0,
         * ]
         */
        $calendarByWeek = Array();
        foreach ($calendar as $key => $value) {
            //$key1 месяц
            foreach ($value as $key2 => $value2) {
                //$key2 неделя
                foreach ($value2 as $key3 => $value3) {
                    //$key3 день недели
                    $calendarByWeek[$key2][$key3] = $value3;
                }
            }
        }

        /**
         * Вычисляем количество дней которые пропущены вначале года
         */

        $countStartDayOfWeek = 0;
        for ($i = 1; $i <= 7; $i++) {
            if (isset($calendarByWeek['01'][$i])) {
                $countStartDayOfWeek = $i-1;
                break;
            }
        }
        //(new \common\components\dump\Dump())->printR($countStartDayOfWeek);die;
        /**
         * Если пропущенных дни есть то записываем в массив дополнительные дни которые пропущенны
         */

        if ($countStartDayOfWeek <> 0) {
            for ($i = $countStartDayOfWeek; $i >= 1; $i--) {

                //(new \common\components\dump\Dump())->printR($startOfCalendar2->format('Y-m-d'));
                $calendarByWeek['01'][$i]= [
                    'monthDay' => $startOfCalendar2->format('j'),
                    'date' => $startOfCalendar2->format('Y-m-d'),
                    'month' => $startOfCalendar2->format('n'),
                    'monthWeek' => $startOfCalendar2->format('W'),
                    'holiday' => 0,
                    'observance' => 0,
                    'muslim' => 0,
                    'orthodox' => 0,
                ];
                $startOfCalendar2->modify('-1 day');
            }
        }
        //die;
        /**
         * Записываем дату начала недели и дату конца недели.
         * Записываем месяцы в которых есть эта неделя
         */
        $count = 0;

        if ($week == '01' or $week == '52' or $week == '53'){
            ksort($calendarByWeek[$week]);
        }
        (new \common\components\dump\Dump())->printR($calendarByWeek[$week]);die;
        foreach ($calendarByWeek[$week] as $weekDays){
            $count++;

            if ($count == 1){
                $weekStartDate = $weekDays['date'];
            }
            $monthByWeek[] = $weekDays['month'];
            $weekEndDate  = $weekDays['date'];
        }
        //(new \common\components\dump\Dump())->printR($weekStartDate);die;
        $lastWeekYearBefore = 0;
        if ($week == '01') {
            $lastWeekYearBefore = new \DateTime($weekStartDate);
            //$weekStartDate = new \DateTime($year-1 . '-' . $lastWeekYearBefore->format('m') . '-' . $lastWeekYearBefore->format('d'));
            //$weekStartDate = $weekStartDate->format('Y-m-d');
            $lastWeekYearBefore->modify('-6 day');
            $lastWeekYearBefore = $lastWeekYearBefore->format('W');

        }
        //(new \common\components\dump\Dump())->printR($weekStartDate);die;
        //(new \common\components\dump\Dump())->printR($weekEndDate);die;
        //(new \common\components\dump\Dump())->printR(array_unique($monthByWeek));die;
        return [
            'calendar' => $calendar,
            'weekStartDate' => $weekStartDate,
            'weekEndDate' => $weekEndDate,
            'monthByWeek' => array_unique($monthByWeek),
            'lastWeekYearBefore' => $lastWeekYearBefore,
        ];
    }

}

