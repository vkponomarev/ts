<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsMessagesByCalendarQuarter

{

    public function messages($dateData, $quarter, $countHolidays)
    {

        $nameOfDaysInWeek[1] = Yii::t('app', 'on Monday');
        $nameOfDaysInWeek[2] = Yii::t('app', 'on Tuesday');
        $nameOfDaysInWeek[3] = Yii::t('app', 'on Wednesday');
        $nameOfDaysInWeek[4] = Yii::t('app', 'on Thursday');
        $nameOfDaysInWeek[5] = Yii::t('app', 'on Friday');
        $nameOfDaysInWeek[6] = Yii::t('app', 'on Saturday');
        $nameOfDaysInWeek[7] = Yii::t('app', 'on Sunday');

        return [

            'firstDay' => $nameOfDaysInWeek[$dateData['quarter'][$quarter]['firstDay']],
            'lastDay' => $nameOfDaysInWeek[$dateData['quarter'][$quarter]['lastDay']],
            'countHolidaysText' => Yii::t('app', '{n,plural, one{# holiday and day off} few{# holidays and days off} other{# holidays and days off}}', ['n' => $countHolidays]),

        ];


    }

}