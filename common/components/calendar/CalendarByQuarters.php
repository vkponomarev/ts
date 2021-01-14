<?php

namespace common\components\calendar;

class CalendarByQuarters
{

    public function calendar($year, $quarter, $holidaysData)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца

        // Настройки для полного года
        $countHolidays[1] = 0;
        $countHolidays[2] = 0;
        $countHolidays[3] = 0;
        $countHolidays[4] = 0;
        $countHolidays[5] = 0;
        $countHolidays[6] = 0;
        $countHolidays[7] = 0;
        $countHolidays[8] = 0;
        $countHolidays[9] = 0;
        $countHolidays[10] = 0;
        $countHolidays[11] = 0;
        $countHolidays[12] = 0;

        $weekends[1] = 0;
        $weekends[2] = 0;
        $weekends[3] = 0;
        $weekends[4] = 0;
        $weekends[5] = 0;
        $weekends[6] = 0;
        $weekends[7] = 0;
        $weekends[8] = 0;
        $weekends[9] = 0;
        $weekends[10] = 0;
        $weekends[11] = 0;
        $weekends[12] = 0;

        $weekendsAndHolidays[1] = 0;
        $weekendsAndHolidays[2] = 0;
        $weekendsAndHolidays[3] = 0;
        $weekendsAndHolidays[4] = 0;
        $weekendsAndHolidays[5] = 0;
        $weekendsAndHolidays[6] = 0;
        $weekendsAndHolidays[7] = 0;
        $weekendsAndHolidays[8] = 0;
        $weekendsAndHolidays[9] = 0;
        $weekendsAndHolidays[10] = 0;
        $weekendsAndHolidays[11] = 0;
        $weekendsAndHolidays[12] = 0;

        $workingDays[1] = 0;
        $workingDays[2] = 0;
        $workingDays[3] = 0;
        $workingDays[4] = 0;
        $workingDays[5] = 0;
        $workingDays[6] = 0;
        $workingDays[7] = 0;
        $workingDays[8] = 0;
        $workingDays[9] = 0;
        $workingDays[10] = 0;
        $workingDays[11] = 0;
        $workingDays[12] = 0;

        $allHolidays[1] = 0;
        $allHolidays[2] = 0;
        $allHolidays[3] = 0;
        $allHolidays[4] = 0;
        $allHolidays[5] = 0;
        $allHolidays[6] = 0;
        $allHolidays[7] = 0;
        $allHolidays[8] = 0;
        $allHolidays[9] = 0;
        $allHolidays[10] = 0;
        $allHolidays[11] = 0;
        $allHolidays[12] = 0;
        $calendar = array();

        $startOfCalendar = new \DateTime($year . '-01-01');

        $daysInMonth[1] = cal_days_in_month(CAL_GREGORIAN, 1, $year);
        $daysInMonth[2] = cal_days_in_month(CAL_GREGORIAN, 2, $year);
        $daysInMonth[3] = cal_days_in_month(CAL_GREGORIAN, 3, $year);
        $daysInMonth[4] = cal_days_in_month(CAL_GREGORIAN, 4, $year);
        $daysInMonth[5] = cal_days_in_month(CAL_GREGORIAN, 5, $year);
        $daysInMonth[6] = cal_days_in_month(CAL_GREGORIAN, 6, $year);
        $daysInMonth[7] = cal_days_in_month(CAL_GREGORIAN, 7, $year);
        $daysInMonth[8] = cal_days_in_month(CAL_GREGORIAN, 8, $year);
        $daysInMonth[9] = cal_days_in_month(CAL_GREGORIAN, 9, $year);
        $daysInMonth[10] = cal_days_in_month(CAL_GREGORIAN, 10, $year);
        $daysInMonth[11] = cal_days_in_month(CAL_GREGORIAN, 11, $year);
        $daysInMonth[12] = cal_days_in_month(CAL_GREGORIAN, 12, $year);

        //$startOfCalendar = $startOfCalendar->modify('+8 month');

        if ($quarter == 1) {
            $startMonth = 1;
            $endMonth = 3;
        }

        if ($quarter == 2) {
            $startMonth = 4;
            $endMonth = 6;
            $startOfCalendar = $startOfCalendar->modify('+3 month');
        }

        if ($quarter == 3) {
            $startMonth = 7;
            $endMonth = 9;
            $startOfCalendar = $startOfCalendar->modify('+6 month');

        }
        if ($quarter == 4) {
            $startMonth = 10;
            $endMonth = 12;
            $startOfCalendar = $startOfCalendar->modify('+9 month');
        }

        $eachDay = $startOfCalendar;

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

            if ($weekDay == 6 or $weekDay == 7) {
                $weekends[$month]++;
            }
            // Ищем текущую дату в массиве праздников
            $key = array_search($date, array_column($holidaysData, 'date'));
            // Если находим такую дату праздниках и эта дата выходной то
            if (false !== $key && $holidaysData[$key]['holiday'] == 1) {
                if ($weekDay == 6 or $weekDay == 7) {
                    $weekendsAndHolidays[$month]++;
                }
                $countHolidays[$month]++;
            }
        } while (($eachDay->format('n') >= $startMonth) and ($eachDay->format('n') <= $endMonth));


        foreach (range($startMonth, $endMonth) as $oneMonth) {

            $workingDays[$oneMonth] = $daysInMonth[$oneMonth] - $countHolidays[$oneMonth] - $weekends[$oneMonth] + $weekendsAndHolidays[$oneMonth];
            $allHolidays[$oneMonth] = $countHolidays[$oneMonth] + $weekends[$oneMonth] - $weekendsAndHolidays[$oneMonth];

        }
        $hours40 = array();
        $hours36 = array();
        $hours24 = array();
        foreach (range($startMonth, $endMonth) as $oneMonth) {
            $hours40[$oneMonth] = 8 * $workingDays[$oneMonth];
            $hours36[$oneMonth] = 7.2 * $workingDays[$oneMonth];
            $hours24[$oneMonth] = 4.8 * $workingDays[$oneMonth];

        }

        $quarters = array();

        if ($quarter == 1){
            $quarters[1]['hours40'] = $hours40[1] + $hours40[2] + $hours40[3];
            $quarters[1]['hours36'] = $hours36[1] + $hours36[2] + $hours36[3];
            $quarters[1]['hours24'] = $hours24[1] + $hours24[2] + $hours24[3];
            $quarters[1]['allHolidays'] = $allHolidays[1] + $allHolidays[2] + $allHolidays[3];
            $quarters[1]['days'] = $daysInMonth[1] + $daysInMonth[2] + $daysInMonth[3];
            $quarters[1]['workingDays'] = $workingDays[1] + $workingDays[2] + $workingDays[3];
        }


        if ($quarter == 2){
            $quarters[2]['hours40'] = $hours40[4] + $hours40[5] + $hours40[6];
            $quarters[2]['hours36'] = $hours36[4] + $hours36[5] + $hours36[6];
            $quarters[2]['hours24'] = $hours24[4] + $hours24[5] + $hours24[6];
            $quarters[2]['allHolidays'] = $allHolidays[4] + $allHolidays[5] + $allHolidays[6];
            $quarters[2]['days'] = $daysInMonth[4] + $daysInMonth[5] + $daysInMonth[6];
            $quarters[2]['workingDays'] = $workingDays[4] + $workingDays[5] + $workingDays[6];
        }

        if ($quarter == 3){
            $quarters[3]['hours40'] = $hours40[7] + $hours40[8] + $hours40[9];
            $quarters[3]['hours36'] = $hours36[7] + $hours36[8] + $hours36[9];
            $quarters[3]['hours24'] = $hours24[7] + $hours24[8] + $hours24[9];
            $quarters[3]['allHolidays'] = $allHolidays[7] + $allHolidays[8] + $allHolidays[9];
            $quarters[3]['days'] = $daysInMonth[7] + $daysInMonth[8] + $daysInMonth[9];
            $quarters[3]['workingDays'] = $workingDays[7] + $workingDays[8] + $workingDays[9];
        }

        if ($quarter == 4){
            $quarters[4]['hours40'] = $hours40[10] + $hours40[11] + $hours40[12];
            $quarters[4]['hours36'] = $hours36[10] + $hours36[11] + $hours36[12];
            $quarters[4]['hours24'] = $hours24[10] + $hours24[11] + $hours24[12];
            $quarters[4]['allHolidays'] = $allHolidays[10] + $allHolidays[11] + $allHolidays[12];
            $quarters[4]['days'] = $daysInMonth[10] + $daysInMonth[11] + $daysInMonth[12];
            $quarters[4]['workingDays'] = $workingDays[10] + $workingDays[11] + $workingDays[12];
        }




        return [
            'calendar' => $calendar,
            'calendarStartMonth' => $startMonth,
            'countHolidays' => $countHolidays,
            'weekends' => $weekends,
            'weekendsAndHolidays' => $weekendsAndHolidays,
            'workingDays' => $workingDays,
            'daysInMonth' => $daysInMonth,
            'allHolidays' => $allHolidays,
            'hours40' => $hours40,
            'hours36' => $hours36,
            'hours24' => $hours24,
            'quarter' => $quarters,
        ];
    }

}

