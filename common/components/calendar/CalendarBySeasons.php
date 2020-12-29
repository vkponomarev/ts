<?php

namespace common\components\calendar;

class CalendarBySeasons
{

    public function calendar($year, $season)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца

        // Настройки для полного года


        $calendar = array();

        $startOfCalendar = new \DateTime($year . '-01-01');
        $eachDay = $startOfCalendar;
        //$startOfCalendar = $startOfCalendar->modify('+8 month');

        if ($season == 'autumn') {
            $startMonth = 9;
            $endMonth = 11;
            $startOfCalendar = $startOfCalendar->modify('+8 month');

            do {

                $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = [
                    'monthDay' => $eachDay->format('j'),
                    'date' => $eachDay->format('Y-m-d'),
                    'month' => $eachDay->format('n'),
                    'holiday' => 0,
                    'observance' => 0,
                    'muslim' => 0,
                    'orthodox' => 0,
                ];
                $eachDay->modify('+1 day');

            } while (($eachDay->format('n') >= $startMonth) and ($eachDay->format('n') <= $endMonth));

        }

        if ($season == 'spring') {
            $startMonth = 3;
            $endMonth = 5;
            $startOfCalendar = $startOfCalendar->modify('+2 month');

            do {

                $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = [
                    'monthDay' => $eachDay->format('j'),
                    'date' => $eachDay->format('Y-m-d'),
                    'month' => $eachDay->format('n'),
                    'holiday' => 0,
                    'observance' => 0,
                    'muslim' => 0,
                    'orthodox' => 0,
                ];
                $eachDay->modify('+1 day');

            } while (($eachDay->format('n') >= $startMonth) and ($eachDay->format('n') <= $endMonth));

        }

        if ($season == 'summer') {
            $startMonth = 6;
            $endMonth = 8;
            $startOfCalendar = $startOfCalendar->modify('+5 month');

            do {

                $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = [
                    'monthDay' => $eachDay->format('j'),
                    'date' => $eachDay->format('Y-m-d'),
                    'month' => $eachDay->format('n'),
                    'holiday' => 0,
                    'observance' => 0,
                    'muslim' => 0,
                    'orthodox' => 0,
                ];
                $eachDay->modify('+1 day');

            } while (($eachDay->format('n') >= $startMonth) and ($eachDay->format('n') <= $endMonth));

        }


        if ($season == 'winter') {
            $startMonth = 12;
            $endMonth = 2;
            $startOfCalendar = $startOfCalendar->modify('-1 month');
            $countMonths = 0;
            do {

                $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = [
                    'monthDay' => $eachDay->format('j'),
                    'date' => $eachDay->format('Y-m-d'),
                    'month' => $eachDay->format('n'),
                    'holiday' => 0,
                    'observance' => 0,
                    'muslim' => 0,
                    'orthodox' => 0,
                ];
                $eachDay->modify('+1 day');

            } while (($eachDay->format('n') == $startMonth) or ($eachDay->format('n') <= $endMonth));

        }

        return [
            'calendar' => $calendar,
            'calendarStartMonth' => $startMonth,
        ];
    }

}

