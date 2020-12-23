<?php

namespace common\components\calendar;

class CalendarByDays
{

    public function calendar($startDate, $endDate)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца
        // $calendar[месяц][неделя][день недели] = день месяца
        // Настройки для полного года

        $startDate = '2020-02-02';
        $endDate = '2020-02-10';

        //$startOfCalendar = new \DateTime('2020-01-01');
        $calendar = array();

        $startOfCalendar = new \DateTime($startDate);
        $endOfCalendar = new \DateTime($endDate);

        $interval = $startOfCalendar->diff($endOfCalendar);

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
        $count = 0;
        do {
            $count ++;
            $calendar[$count] = [
                'year' => $eachDay->format('Y'),
                'month' => $eachDay->format('n'),
                'monthDay' => $eachDay->format('j'),
                'date' => $eachDay->format('Y-m-d'),
                'week' => $eachDay->format('W'),
                'weekDay' => $eachDay->format('N'),
                'holiday' => 0,
                'observance' => 0,
                'muslim' => 0,
                'orthodox' => 0,
            ];
            $eachDay->modify('+1 day');
            $countDays++;

        } while ($countDays <$interval->days);

        return $calendar;
    }

}

