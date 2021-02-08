<?php

namespace common\components\calendar;

class CalendarByZodiacSign
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @param $zodiacs \common\componentsV2\zodiacs\Zodiacs
     * @return array
     * @throws \Exception
     */
    public function calendar($date, $zodiacs)
    {
        // format('n') - порядковый номер месяца
        // format('W') - порядковый номер недели
        // format('N') - порядковый номер дня недели
        // format('j') - порядковый номер дня месяца
        // Настройки для полного года
        /*if ($year <> '0001') {
                        if ($date['month'] == '01'){


                        }
                        $startOfCalendar = new \DateTime($yearMinusOne . '-12-01');
                    } else {
                        $startOfCalendar = new \DateTime($year . '-01-01');
                    }

                    if ($year <> '9999') {
                        $endOfCalendar = new \DateTime($yearPlusOne . '-01-31');
                    } else {
                        $endOfCalendar = new \DateTime($year . '-12-31');
                    }*/
        $calendar = array();

        $date->year->current;

        $zodiacs->zodiac->range['start'];
        $zodiacs->zodiac->range['end'];


        $countDays = 0;

        $year = str_pad($date->year->current, 4, '0', STR_PAD_LEFT);
        $yearMinusOne = str_pad($date->year->current - 1, 4, '0', STR_PAD_LEFT);
        $yearPlusOne = str_pad($date->year->current + 1, 4, '0', STR_PAD_LEFT);

        $zodiac[$zodiacs->zodiac->id]['start'] = $year . '-' . $zodiacs->zodiac->range['start'];
        $zodiac[$zodiacs->zodiac->id]['end'] = $year . '-' . $zodiacs->zodiac->range['end'];


        //(new \common\components\dump\Dump())->printR($zodiac);die;



        if ($zodiacs->zodiac->id <> 10) {

            if ($zodiacs->zodiac->id == 1) {
                $startOfCalendar = new \DateTime($year . '-03-01');
                $endOfCalendar = new \DateTime($year . '-04-30');

            }
            if ($zodiacs->zodiac->id == 2) {
                $startOfCalendar = new \DateTime($year . '-04-01');
                $endOfCalendar = new \DateTime($year . '-05-31');
            }
            if ($zodiacs->zodiac->id == 3) {
                $startOfCalendar = new \DateTime($year . '-05-01');
                $endOfCalendar = new \DateTime($year . '-06-30');
            }
            if ($zodiacs->zodiac->id == 4) {
                $startOfCalendar = new \DateTime($year . '-06-01');
                $endOfCalendar = new \DateTime($year . '-07-31');
            }
            if ($zodiacs->zodiac->id == 5) {
                $startOfCalendar = new \DateTime($year . '-07-01');
                $endOfCalendar = new \DateTime($year . '-08-31');
            }
            if ($zodiacs->zodiac->id == 6) {
                $startOfCalendar = new \DateTime($year . '-08-01');
                $endOfCalendar = new \DateTime($year . '-09-30');
            }
            if ($zodiacs->zodiac->id == 7) {
                $startOfCalendar = new \DateTime($year . '-09-01');
                $endOfCalendar = new \DateTime($year . '-10-31');
            }
            if ($zodiacs->zodiac->id == 8) {
                $startOfCalendar = new \DateTime($year . '-10-01');
                $endOfCalendar = new \DateTime($year . '-11-30');
            }
            if ($zodiacs->zodiac->id == 9) {
                $startOfCalendar = new \DateTime($year . '-11-01');
                $endOfCalendar = new \DateTime($year . '-12-31');
            }
            if ($zodiacs->zodiac->id == 11) {
                $startOfCalendar = new \DateTime($year . '-01-01');
                $endOfCalendar = new \DateTime($year . '-02-' . $date->year->februaryDays);
            }

            if ($zodiacs->zodiac->id == 12) {
                $startOfCalendar = new \DateTime($year . '-02-01');
                $endOfCalendar = new \DateTime($year . '-03-31');
            }

            if ($zodiacs->zodiac->id == 9) {
                $startOfCalendar = new \DateTime($year . '-11-01');
                $endOfCalendar = new \DateTime($year . '-12-31');
            }


        } else {
            if ($year == '9999') {
                $startOfCalendar = new \DateTime($year . '-12-01');
                $endOfCalendar = new \DateTime($year . '-12-31');
                $startOfCalendar2 = new \DateTime($yearMinusOne . '-12-01');
                $endOfCalendar2 = new \DateTime($year . '-01-31');
                $zodiac[$zodiacs->zodiac->id]['start'] = $year . '-' . $zodiacs->zodiac->range['start'];
                $zodiac[$zodiacs->zodiac->id]['end'] = $year . '-12-31';
                $zodiac2[$zodiacs->zodiac->id]['start'] = $yearMinusOne . '-' . $zodiacs->zodiac->range['start'];
                $zodiac2[$zodiacs->zodiac->id]['end'] = $year . '-' . $zodiacs->zodiac->range['end'];
            } else if ($year == '0001') {
                $startOfCalendar = new \DateTime($year . '-12-01');
                $endOfCalendar = new \DateTime($yearPlusOne . '-01-31');
                $startOfCalendar2 = new \DateTime($year . '-01-01');
                $endOfCalendar2 = new \DateTime($year . '-01-31');
                $zodiac[$zodiacs->zodiac->id]['start'] = $year . '-' . $zodiacs->zodiac->range['start'];
                $zodiac[$zodiacs->zodiac->id]['end'] = $yearPlusOne . '-' . $zodiacs->zodiac->range['end'];
                $zodiac2[$zodiacs->zodiac->id]['start'] = $year . '-01-01';
                $zodiac2[$zodiacs->zodiac->id]['end'] = $year . '-' . $zodiacs->zodiac->range['end'];
            } else {
                $startOfCalendar = new \DateTime($year . '-12-01');
                $endOfCalendar = new \DateTime($yearPlusOne . '-01-31');
                $startOfCalendar2 = new \DateTime($yearMinusOne . '-12-01');
                $endOfCalendar2 = new \DateTime($year . '-01-31');
                $zodiac[$zodiacs->zodiac->id]['start'] = $year . '-' . $zodiacs->zodiac->range['start'];
                $zodiac[$zodiacs->zodiac->id]['end'] = $yearPlusOne . '-' . $zodiacs->zodiac->range['end'];
                $zodiac2[$zodiacs->zodiac->id]['start'] = $yearMinusOne . '-' . $zodiacs->zodiac->range['start'];
                $zodiac2[$zodiacs->zodiac->id]['end'] = $year . '-' . $zodiacs->zodiac->range['end'];
            }
        }


        //$startOfCalendar = new \DateTime($date['year'] . '-' . $date['month'] . '-01');
        $eachDay = $startOfCalendar;
        $endDay = $endOfCalendar;
        $endDay = $endDay->format('Y-m-d');


        $zodiacID = 0;
        do {

            $dayNow = $eachDay->format('Y-m-d');
            foreach ($zodiac as $id => $range) {
                if ($dayNow >= $range['start'] && $dayNow <= $range['end']) {
                    $zodiacID = $id;
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
            $zodiacID = 0;
        } while ($dayNow < $endDay);
        //(new \common\components\dump\Dump())->printR($calendar);die;
        $calendar2 = array();

        if ($zodiacs->zodiac->id == 10) {
            $eachDay2 = $startOfCalendar2;
            $endDay2 = $endOfCalendar2;
            $endDay2 = $endDay2->format('Y-m-d');

            $zodiacID = 0;
            do {

                $dayNow2 = $eachDay2->format('Y-m-d');
                if ($dayNow2 >= $zodiac2[10]['start'] && $dayNow2 <= $zodiac2[10]['end']) {
                    $zodiacID = 10;
                }


                $calendar2[$eachDay2->format('n')][$eachDay2->format('W')][$eachDay2->format('N')] = [
                    'monthDay' => $eachDay2->format('j'),
                    'date' => $dayNow2,
                    'month' => $eachDay2->format('n'),
                    'zodiacID' => $zodiacID,
                    'holiday' => 0,
                    'observance' => 0,
                    'muslim' => 0,
                    'orthodox' => 0,
                ];
                $eachDay2->modify('+1 day');
                $countDays++;
                $zodiacID = 0;
            } while ($dayNow2 < $endDay2);

        }

        return [
            'calendar' => $calendar,
            'calendar2' => $calendar2,
            'signID' => $zodiacs->zodiac->id,


        ];

    }


}

