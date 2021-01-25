<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsMessagesByCalendarMonthMoon

{

    public function messages($dateData)
    {
        /*
        {season} pageTextsMessages
        {month_day_begin} pageTextsMessages
        {month_day_end}
        */

        $month[1] = Yii::t('app', 'winter');
        $month[2] = Yii::t('app', 'winter');
        $month[3] = Yii::t('app', 'spring');
        $month[4] = Yii::t('app', 'spring');
        $month[5] = Yii::t('app', 'spring');
        $month[6] = Yii::t('app', 'summer');
        $month[7] = Yii::t('app', 'summer');
        $month[8] = Yii::t('app', 'summer');
        $month[9] = Yii::t('app', 'autumn');
        $month[10] = Yii::t('app', 'autumn');
        $month[11] = Yii::t('app', 'autumn');
        $month[12] = Yii::t('app', 'winter');

        $monthDaysCount[28] = Yii::t('app', '28 days');
        $monthDaysCount[29] = Yii::t('app', '29 days');
        $monthDaysCount[30] = Yii::t('app', '30 days');
        $monthDaysCount[31] = Yii::t('app', '31 days');

        $nameOfDaysInWeek[1] = Yii::t('app', 'on Monday');
        $nameOfDaysInWeek[2] = Yii::t('app', 'on Tuesday');
        $nameOfDaysInWeek[3] = Yii::t('app', 'on Wednesday');
        $nameOfDaysInWeek[4] = Yii::t('app', 'on Thursday');
        $nameOfDaysInWeek[5] = Yii::t('app', 'on Friday');
        $nameOfDaysInWeek[6] = Yii::t('app', 'on Saturday');
        $nameOfDaysInWeek[7] = Yii::t('app', 'on Sunday');


        return [
            'firstDay' => $nameOfDaysInWeek[$dateData['month']['firstDay']],
            'lastDay' => $nameOfDaysInWeek[$dateData['month']['lastDay']],
            'countDays' => $monthDaysCount[$dateData['month']['countDays']],
             ];


    }

}