<?php

namespace common\components\calendar;

class CalendarByMonthWeek
{

    public function calendar($year, $week, $weekCount)
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

        $startOfCalendar = new \DateTime($year - 1 . '-12-01');
        $endOfCalendar = new \DateTime($year + 1 . '-01-31');

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
            $calendar[$eachDay->format('Y')][$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = [
                'monthDay' => $eachDay->format('j'),
                'date' => $eachDay->format('Y-m-d'),
                'month' => $eachDay->format('n'),
                'year' => $eachDay->format('Y'),
                'monthWeek' => $eachDay->format('W'),
                'holiday' => 0,
                'observance' => 0,
                'muslim' => 0,
                'orthodox' => 0,
            ];
            $eachDay->modify('+1 day');
            $countDays++;

        } while ($eachDay->format('Y-m-d') <= $endOfCalendar->format('Y-m-d'));

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
        foreach ($calendar as $key0 => $value) {
            //$key0 год
            foreach ($value as $key1 => $value1) {
                //$key1 месяц
                foreach ($value1 as $key2 => $value2) {
                    //$key2 неделя
                    foreach ($value2 as $key3 => $value3) {
                        //$key3 день недели
                        $calendarByWeek[$key2][$key0][$key1][$key3] = $value3;
                        $calendarByWeekSecond[$key0][$key2][$key3] = $value3;
                    }
                }
            }
        }
        //(new \common\components\dump\Dump())->printR($calendarByWeekSecond);die;

        //$calendar['неделя']["год"]['месяц']['день недели'];
        //Если мы находимся на первой неделе
        if ($week == '01') {
            //Если первый день недели в этом году не задан то
            if (!isset($calendarByWeek[$week][$year][1][1])) {
                //то мы задаем начало даты от предыдущего года
                $weekStart = $calendarByWeek[$week][$year - 1][12][1];
            } else {
                //Если первый день текущего года задан то
                $weekStart = $calendarByWeek[$week][$year][1][1];
            }
            // Если последний день недели в этом году не задан то
            if (!isset($calendarByWeek[$week][$year - 1][12][7])) {
                $weekEnd = $calendarByWeek[$week][$year][1][7];
            } else {
                $weekEnd = $calendarByWeek[$week][$year - 1][12][7];
            }

        } elseif ($week == $weekCount) {

            $weekStart = $calendarByWeek[$week][$year][12][1];
            if (!isset($calendarByWeek[$week][$year][12][7])) {
                $weekEnd = $calendarByWeek[$weekCount][$year + 1][1][7];
            } else {
                $weekEnd = $calendarByWeek[$week][$year][12][7];
            }
        } else {
            //$calendarByWeekSecond['год']["неделя"]['день недели']
            $weekStart = $calendarByWeekSecond[$year][$week][1];
            $weekEnd = $calendarByWeekSecond[$year][$week][7];

        }


        if (($weekStart['year'] == $weekEnd['year']) &&
            ($weekStart['month'] == $weekEnd['month'])){

            $monthByWeek[0]['year'] = $weekStart['year'];
            $monthByWeek[0]['month'] = $weekStart['month'];
        } else {
            $monthByWeek[0]['year'] = $weekStart['year'];
            $monthByWeek[0]['month'] = $weekStart['month'];
            $monthByWeek[1]['year'] = $weekEnd['year'];
            $monthByWeek[1]['month'] = $weekEnd['month'];

        }
        $lastWeekYearBefore = 0;
        if ($week == '01') {
            $lastWeekYearBefore = new \DateTime($weekStart['date']);
            $lastWeekYearBefore->modify('-6 day');
            $lastWeekYearBefore = $lastWeekYearBefore->format('W');

        }


        return [
            'calendar' => $calendar,
            'weekStartDate' => $weekStart['date'],
            'weekEndDate' => $weekEnd['date'],
            'monthByWeek' => $monthByWeek,
            'lastWeekYearBefore' => $lastWeekYearBefore,
        ];
    }

}

