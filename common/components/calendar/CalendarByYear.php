<?php

namespace common\components\calendar;

class CalendarByYear
{

    public function calendar($year)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца
        // $calendar[месяц][неделя][день недели] = день месяца
        // Настройки для полного года
        $calendar = array();

        $startOfCalendar = new \DateTime($year . '-01-01');

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
                'date' =>  $eachDay->format('Y-m-d'),
                'month' => $eachDay->format('n'),
                'week' => $eachDay->format('W'),
                'holiday' => 0,
                'observance' => 0,
                'muslim' => 0,
                'orthodox' => 0,

            ];
            $eachDay->modify('+1 day');
            $countDays++;

        } while ($countDays < $daysInYear);

        return $calendar;
    }

}

