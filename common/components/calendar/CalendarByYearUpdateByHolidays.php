<?php

namespace common\components\calendar;

class CalendarByYearUpdateByHolidays
{

    public function calendar($calendar, $holidays)
    {

        foreach ($holidays as $holiday) {

            $calendar[$holiday['month']][$holiday['week']][$holiday['weekDay']]['holiday'] = 1;

        }

        
        return $calendar;
        
    }

}

