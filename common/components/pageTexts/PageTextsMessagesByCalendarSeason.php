<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsMessagesByCalendarSeason

{

    public function messages($dateData)
    {



        return [

            'animal' => $animal[$calendarChinese['animal']],
            'color' => $color[$calendarChinese['color']],
            'element' => $element[$calendarChinese['element']],
            'firstDay' => $nameOfDaysInWeek[$dateData['year']['firstDay']],
            'lastDay' => $nameOfDaysInWeek[$dateData['year']['lastDay']],
            'leapText' => $leapText,

        ];


    }

}