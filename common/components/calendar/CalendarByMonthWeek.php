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

        $yearMinusOne = str_pad((int)$year - 1, 4, '0', STR_PAD_LEFT);
        $yearPlusOne = str_pad((int)$year + 1, 4, '0', STR_PAD_LEFT);
        if ($year <> '0001') {
            $startOfCalendar = new \DateTime($yearMinusOne . '-12-01');
        } else {
            $startOfCalendar = new \DateTime($year . '-01-01');
        }

        if ($year <> '9999') {
            $endOfCalendar = new \DateTime($yearPlusOne . '-01-31');
        } else {
            $endOfCalendar = new \DateTime($year . '-12-31');
        }

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
            if ($eachDay->format('Y') == 10000) {
                break;
            }

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

        //$calendarByWeek[$key2][$key0][$key1][$key3]
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
                        //$calendarByWeekTwo[$key2][$key3] = $value3;
                    }
                }
            }
        }
        //(new \common\components\dump\Dump())->printR($calendarByWeekSecond);die;

        //$calendar['неделя']["год"]['месяц']['день недели'];
        //Если мы находимся на первой неделе
        //$year = (int)$year;
        if ($week == '01') {
            //Если первый день недели в этом году не задан то
            if (!isset($calendarByWeek[$week][$year][1][1])) {
                //то мы задаем начало даты от предыдущего года
                $weekStart = $calendarByWeek[$week][$yearMinusOne][12][1];
            } else {
                //Если первый день текущего года задан то
                $weekStart = $calendarByWeek[$week][$year][1][1];
            }
            // Если последний день недели в этом году не задан то
            if (!isset($calendarByWeek[$week][$yearMinusOne][12][7])) {
                $weekEnd = $calendarByWeek[$week][$year][1][7];
            } else {
                $weekEnd = $calendarByWeek[$week][$yearMinusOne][12][7];
            }

        } elseif ($week == $weekCount) {

            $weekStart = $calendarByWeek[$week][$year][12][1];
            if ($year == '9999') {
                if (isset($calendarByWeek[$week][$year][12][7])) {
                    $weekEnd = $calendarByWeek[$week][$year][12][7];
                } elseif (isset($calendarByWeek[$week][$year][12][6])){
                    $weekEnd = $calendarByWeek[$week][$year][12][6];
                } elseif (isset($calendarByWeek[$week][$year][12][5])){
                    $weekEnd = $calendarByWeek[$week][$year][12][5];
                } elseif (isset($calendarByWeek[$week][$year][12][4])){
                    $weekEnd = $calendarByWeek[$week][$year][12][4];
                } elseif (isset($calendarByWeek[$week][$year][12][3])){
                    $weekEnd = $calendarByWeek[$week][$year][12][3];
                } elseif (isset($calendarByWeek[$week][$year][12][2])){
                    $weekEnd = $calendarByWeek[$week][$year][12][2];
                }
            } else {


                if (!isset($calendarByWeek[$week][$year][12][7])) {
                    $weekEnd = $calendarByWeek[$weekCount][$yearPlusOne][1][7];
                } else {
                    $weekEnd = $calendarByWeek[$week][$year][12][7];
                }

            }
        } else {
            //$calendarByWeekSecond['год']["неделя"]['день недели']
            $weekStart = $calendarByWeekSecond[$year][$week][1];
            $weekEnd = $calendarByWeekSecond[$year][$week][7];

        }


        if (($weekStart['year'] == $weekEnd['year']) &&
            ($weekStart['month'] == $weekEnd['month'])) {

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

        // (new \common\components\dump\Dump())->printR($monthByWeek);die;


        $weekStartDate = new \DateTime($weekStart['date']);
        $weekEndDate = new \DateTime($weekEnd['date']);
        $dayCount = 0;
        do {
            $dayCount++;
            $weekDaysNumber[$dayCount] = [
                'monthDay' => $weekStartDate->format('j'),
            ];
            $weekStartDate->modify('+1 day');
            if ($eachDay->format('Y') == 10000) {
                break;
            }
        } while ($weekStartDate->format('Y-m-d') <= $weekEndDate->format('Y-m-d'));


        return [
            'calendar' => $calendar,
            'weekDaysNumber' => $weekDaysNumber,
            'weekStartDate' => $weekStart['date'],
            'weekEndDate' => $weekEnd['date'],
            'monthByWeek' => $monthByWeek,
            'lastWeekYearBefore' => $lastWeekYearBefore,


        ];
    }

}

