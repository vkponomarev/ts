<?php

namespace common\components\calendar;

class CalendarByMonthBusiness
{

    public function calendar($monthURL, $holidaysData, $sixDays = 0)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца
        // Настройки для полного года

        $calendar = array();
        $startOfCalendar = new \DateTime($monthURL['year'] . '-' . $monthURL['month'] . '-01');

        $daysInYear = $startOfCalendar->format('L') ? 366 : 365;

        $eachDay = $startOfCalendar;

        $countDays = 0;


        $daysInMonth[(int)$monthURL['month']] = cal_days_in_month(CAL_GREGORIAN, (int)$monthURL['month'], $monthURL['year']);
        $countHolidays[(int)$monthURL['month']] = 0;
        $weekends[(int)$monthURL['month']] = 0;
        $weekendsAndHolidays[(int)$monthURL['month']] = 0;
        $workingDays[(int)$monthURL['month']] = 0;
        $allHolidays[(int)$monthURL['month']] = 0;
        do {

            $date = $eachDay->format('Y-m-d');
            $month = $eachDay->format('n');
            $weekDay = $eachDay->format('N');

            $calendar[$month][$eachDay->format('W')][$weekDay] = [
                'monthDay' => $eachDay->format('j'),
                'date' => $date,
                'month' => $month,
                'holiday' => 0,
                'observance' => 0,
                'muslim' => 0,
                'orthodox' => 0,
            ];
            $eachDay->modify('+1 day');
            $countDays++;

            if ($sixDays == 0) {
                if ($weekDay == 6 or $weekDay == 7) {
                    $weekends[(int)$monthURL['month']]++;
                }
            } else {
                if ($weekDay == 7) {
                    $weekends[(int)$monthURL['month']]++;
                }
            }

            // Ищем текущую дату в массиве праздников
            $key = array_search($date, array_column($holidaysData, 'date'));

            // Если находим такую дату праздниках и эта дата выходной то
            if (false !== $key && $holidaysData[$key]['holiday'] == 1) {

                if ($sixDays == 0) {
                    if ($weekDay == 6 or $weekDay == 7) {
                        $weekendsAndHolidays[$month]++;
                    }
                } else {
                    if ($weekDay == 7) {
                        $weekendsAndHolidays[$month]++;
                    }
                }

                $countHolidays[$month]++;
                //$monthHolidays[$month] = $countHolidays;
            }

            $monthLast = $month;

        } while ($eachDay->format('n') == $monthURL['month']);

        $workingDays[(int)$monthURL['month']] = $daysInMonth[(int)$monthURL['month']] - $countHolidays[(int)$monthURL['month']] - $weekends[(int)$monthURL['month']] + $weekendsAndHolidays[(int)$monthURL['month']];
        $allHolidays[(int)$monthURL['month']] = $countHolidays[(int)$monthURL['month']] + $weekends[(int)$monthURL['month']] - $weekendsAndHolidays[(int)$monthURL['month']];

        $hours40 = array();
        $hours36 = array();
        $hours24 = array();

        $hours40[(int)$monthURL['month']] = 8 * $workingDays[(int)$monthURL['month']];
        $hours36[(int)$monthURL['month']] = 7.2 * $workingDays[(int)$monthURL['month']];
        $hours24[(int)$monthURL['month']] = 4.8 * $workingDays[(int)$monthURL['month']];


        return [
            'calendar' => $calendar,
            'countHolidays' => $countHolidays,
            'weekends' => $weekends,
            'weekendsAndHolidays' => $weekendsAndHolidays,
            'workingDays' => $workingDays,
            'daysInMonth' => $daysInMonth,
            'allHolidays' => $allHolidays,
            'hours40' => $hours40,
            'hours36' => $hours36,
            'hours24' => $hours24,
        ];

    }

}

