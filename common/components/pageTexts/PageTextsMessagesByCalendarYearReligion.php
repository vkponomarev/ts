<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsMessagesByCalendarYearReligion

{
    /**
     * @param $calendarChinese
     * @param $date \common\componentsV2\date\Date
     * @param $countHolidays
     * @return array
     */
    public function messages($calendarChinese, $date, $countHolidays)
    {


        $animal[1] = Yii::t('app', 'year of the rat');
        $animal[2] = Yii::t('app', 'year of the bull');
        $animal[3] = Yii::t('app', 'year of the tiger');
        $animal[4] = Yii::t('app', 'year of the rabbit');
        $animal[5] = Yii::t('app', 'year of the dragon');
        $animal[6] = Yii::t('app', 'year of the snake');
        $animal[7] = Yii::t('app', 'year of the horse');
        $animal[8] = Yii::t('app', 'year of the sheep');
        $animal[9] = Yii::t('app', 'year of the monkey');
        $animal[10] = Yii::t('app', 'year of the rooster');
        $animal[11] = Yii::t('app', 'year of the dog');
        $animal[12] = Yii::t('app', 'year of the pig');

        $color[1] = Yii::t('app', 'white');
        $color[2] = Yii::t('app', 'black');
        $color[3] = Yii::t('app', 'blue-green');
        $color[4] = Yii::t('app', 'red');
        $color[5] = Yii::t('app', 'yellow');

        $element[1] = Yii::t('app', 'metal');
        $element[2] = Yii::t('app', 'water');
        $element[3] = Yii::t('app', 'wood');
        $element[4] = Yii::t('app', 'fire');
        $element[5] = Yii::t('app', 'earth');

        $nameOfDaysInWeek[1] = Yii::t('app', 'on Monday');
        $nameOfDaysInWeek[2] = Yii::t('app', 'on Tuesday');
        $nameOfDaysInWeek[3] = Yii::t('app', 'on Wednesday');
        $nameOfDaysInWeek[4] = Yii::t('app', 'on Thursday');
        $nameOfDaysInWeek[5] = Yii::t('app', 'on Friday');
        $nameOfDaysInWeek[6] = Yii::t('app', 'on Saturday');
        $nameOfDaysInWeek[7] = Yii::t('app', 'on Sunday');

        if ($date->year->leap){
            $yearCountDays = 366;
            $leapText = Yii::t('app', 'leap year');
        } else {
            $yearCountDays = 365;
            $leapText = Yii::t('app', 'not a leap year');
        }

        return [

            'animal' => $animal[$calendarChinese['animal']],
            'color' => $color[$calendarChinese['color']],
            'element' => $element[$calendarChinese['element']],
            'firstDay' => $nameOfDaysInWeek[$date->year->firstDay],
            'lastDay' => $nameOfDaysInWeek[$date->year->lastDay],
            'leapText' => $leapText,
            'countHolidaysText' => Yii::t('app', '{n,plural, one{# holiday and day off} few{# holidays and days off} other{# holidays and days off}}', ['n' => $countHolidays]),

        ];


    }

}