<?php

namespace common\components\calendar;

class CalendarByMonth
{

    public function calendar($date)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца
        // Настройки для полного года

        $calendar = array();

        $startOfCalendar = new \DateTime($date['year'] . '-' . $date['month'] . '-01');

        $daysInYear = $startOfCalendar->format('L') ? 366 : 365;

        $eachDay = $startOfCalendar;

        $countDays = 0;

        do {

            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = $eachDay->format('j');
            $eachDay->modify('+1 day');
            $countDays++;

        } while ($eachDay->format('n') == $date['month']);

        return $calendar;
    }

}

