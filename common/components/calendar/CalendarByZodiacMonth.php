<?php

namespace common\components\calendar;

class CalendarByZodiacMonth
{

    public function calendar($date, $zodiacRange)
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


        $year = str_pad($date['year'], 4, '0', STR_PAD_LEFT);
        $yearMinusOne = str_pad($year - 1, 4, '0', STR_PAD_LEFT);
        $yearPlusOne = str_pad($year + 1, 4, '0', STR_PAD_LEFT);


        $zodiac[13]['start'] = $yearMinusOne . '-' . $zodiacRange[10]['start'];
        $zodiac[13]['end'] = $year . '-' . $zodiacRange[10]['end'];

        $zodiac[14]['start'] = $year . '-' . $zodiacRange[11]['start'];
        $zodiac[14]['end'] = $year . '-' . $zodiacRange[11]['end'];

        $zodiac[15]['start'] = $year . '-' . $zodiacRange[12]['start'];
        $zodiac[15]['end'] = $year . '-' . $zodiacRange[12]['end'];

        $zodiac[1]['start'] = $year . '-' . $zodiacRange[1]['start'];
        $zodiac[1]['end'] = $year . '-' . $zodiacRange[1]['end'];

        $zodiac[2]['start'] = $year . '-' . $zodiacRange[2]['start'];
        $zodiac[2]['end'] = $year . '-' . $zodiacRange[2]['end'];

        $zodiac[3]['start'] = $year . '-' . $zodiacRange[3]['start'];
        $zodiac[3]['end'] = $year . '-' . $zodiacRange[3]['end'];

        $zodiac[4]['start'] = $year . '-' . $zodiacRange[4]['start'];
        $zodiac[4]['end'] = $year . '-' . $zodiacRange[4]['end'];

        $zodiac[5]['start'] = $year . '-' . $zodiacRange[5]['start'];
        $zodiac[5]['end'] = $year . '-' . $zodiacRange[5]['end'];

        $zodiac[6]['start'] = $year . '-' . $zodiacRange[6]['start'];
        $zodiac[6]['end'] = $year . '-' . $zodiacRange[6]['end'];

        $zodiac[7]['start'] = $year . '-' . $zodiacRange[7]['start'];
        $zodiac[7]['end'] = $year . '-' . $zodiacRange[7]['end'];

        $zodiac[8]['start'] = $year . '-' . $zodiacRange[8]['start'];
        $zodiac[8]['end'] = $year . '-' . $zodiacRange[8]['end'];

        $zodiac[9]['start'] = $year . '-' . $zodiacRange[9]['start'];
        $zodiac[9]['end'] = $year . '-' . $zodiacRange[9]['end'];

        $zodiac[10]['start'] = $year . '-' . $zodiacRange[10]['start'];
        $zodiac[10]['end'] = $yearPlusOne . '-' . $zodiacRange[10]['end'];



        do {

            $dayNow = $eachDay->format('Y-m-d');
            foreach ($zodiac as $id => $range) {
                if ($dayNow >= $range['start'] && $dayNow <= $range['end']) {
                    $zodiacID = $id;
                    if ($zodiacID == 13)
                        $zodiacID = 10;
                    if ($zodiacID == 14)
                        $zodiacID = 11;
                    if ($zodiacID == 15)
                        $zodiacID = 12;
                }
            }

            $calendar[$eachDay->format('n')][$eachDay->format('W')][$eachDay->format('N')] = [
                'monthDay' => $eachDay->format('j'),
                'date' => $dayNow,
                'month' => $eachDay->format('n'),
                'zodiacID' => $zodiacID,
                'holiday' => 0,
                'observance' => 0,
                'muslim' => 0,
                'orthodox' => 0,
            ];
            $eachDay->modify('+1 day');
            $countDays++;

        } while ($eachDay->format('n') == $date['month']);

        return $calendar;
    }

}

