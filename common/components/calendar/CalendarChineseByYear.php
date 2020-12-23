<?php

namespace common\components\calendar;

use Yii;

class CalendarChineseByYear
{

    public function calendar($year)
    {
/*
        if ($year < 1900 or $year > 2079){

            return 0;

        } else {
*/
            $calendarChineseArray = new CalendarChineseArray();
            $calendar = $calendarChineseArray->calendar($year);
            /*$animal = $calendarChineseArray->animal($calendar['animal']);
            $color = $calendarChineseArray->color($calendar['color']);
            $element = $calendarChineseArray->element($calendar['element']);
            */
            return $calendar;

       // }

    }

}

