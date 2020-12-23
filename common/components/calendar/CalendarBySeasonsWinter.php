<?php

namespace common\components\calendar;

class CalendarBySeasonsWinter
{

    public function calendar($year)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца

        // Настройки для полного года
        $calendar = array();

        $startOfCalendar = new \DateTime($year . '-01-01');

        $startOfCalendar = $startOfCalendar->modify('-1 month');

        $daysInYear = $startOfCalendar->format('L') ? 366 : 365;

        $eachDay = $startOfCalendar;

        $countMonths = 0;

        do {

            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = $eachDay->format('j');
            $eachDay->modify('+1 day');


        } while (($eachDay->format('n') < 3) or ($eachDay->format('n') == 12));

        return $calendar;
    }

}

