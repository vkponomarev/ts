<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsMessagesByCalendarSeason

{

    public function messages($dateData, $season)
    {

        if ($season == 'winter'){
            $seasonOn = Yii::t('app', 'for the winter');
            $seasonWhen = Yii::t('app', 'In the winter');
            $seasonNow = Yii::t('app', 'Winter');
        }
        if ($season == 'spring'){
            $seasonOn = Yii::t('app', 'for the spring');
            $seasonWhen = Yii::t('app', 'In the spring');
            $seasonNow = Yii::t('app', 'Spring');
        }
        if ($season == 'summer'){
            $seasonOn = Yii::t('app', 'for the summer');
            $seasonWhen = Yii::t('app', 'In the summer');
            $seasonNow = Yii::t('app', 'Summer');
        }
        if ($season == 'autumn'){
            $seasonOn = Yii::t('app', 'for the autumn');
            $seasonWhen = Yii::t('app', 'In the autumn');
            $seasonNow = Yii::t('app', 'Autumn');
        }

        $nameOfDaysInWeek[1] = Yii::t('app', 'on Monday');
        $nameOfDaysInWeek[2] = Yii::t('app', 'on Tuesday');
        $nameOfDaysInWeek[3] = Yii::t('app', 'on Wednesday');
        $nameOfDaysInWeek[4] = Yii::t('app', 'on Thursday');
        $nameOfDaysInWeek[5] = Yii::t('app', 'on Friday');
        $nameOfDaysInWeek[6] = Yii::t('app', 'on Saturday');
        $nameOfDaysInWeek[7] = Yii::t('app', 'on Sunday');

        return [

            'firstDay' => $nameOfDaysInWeek[$dateData['season'][$season]['firstDay']],
            'lastDay' => $nameOfDaysInWeek[$dateData['season'][$season]['lastDay']],
            'seasonOn' => $seasonOn,
            'seasonWhen' => $seasonWhen,
            'seasonNow' => $seasonNow,

        ];


    }

}