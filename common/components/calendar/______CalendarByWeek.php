<?php

namespace common\components\calendar;

class CalendarByWeek
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
        $endDate = '2020-05-02';

        //$startOfCalendar = new \DateTime('2020-01-01');
        $calendar = array();

        $startOfCalendar = new \DateTime('2020-01-01');
        $startOfCalendar2 = new \DateTime('2020-01-01');

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
        $CalendarByWeek = Array();
        foreach ($calendar as $key => $value) {
            //$key1 месяц
            foreach ($value as $key2 => $value2) {
                //$key2 неделя
                foreach ($value2 as $key3 => $value3) {
                    //$key3 день недели
                    $CalendarByWeek[$key2][$key3] = $value3;
                }
            }
        }
        /**
         * Вычисляем количество дней которые пропущены вначале года
         */
        $countStartDayOfWeek = 0;
        for ($i = 1; $i <= 7; $i++) {
            if (isset($CalendarByWeek['01'][$i])) {
                $countStartDayOfWeek = $i-1;
                break;
            }
        }
        /**
         * Если пропущенных дни есть то записываем в массив дополнительные дни которые пропущенны
         */
        if ($countStartDayOfWeek <> 0) {
            for ($i = $countStartDayOfWeek; $i >= 1; $i--) {
                $startOfCalendar2->modify('-1 day');
                $CalendarByWeek['01'][$i]= [
                    'monthDay' => $startOfCalendar2->format('j'),
                    'date' => $startOfCalendar2->format('Y-m-d'),
                    'holiday' => 0,
                    'observance' => 0,
                    'muslim' => 0,
                    'orthodox' => 0,
                ];
            }
        }

        return $CalendarByWeek;
    }

}

