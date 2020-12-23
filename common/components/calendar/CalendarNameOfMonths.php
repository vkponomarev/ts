<?php

namespace common\components\calendar;

use Yii;

class CalendarNameOfMonths
{

    public function name()
    {
        $firstMonth = new \DateTime('2020-01-15');
        $countNameOfMonths = 1;
        $nameOfMonths = array();

        do {

            $nameOfMonths[$countNameOfMonths] = Yii::$app->formatter->asDate($firstMonth, 'LLLL');
            $firstMonth->modify('+1 month');
            //echo $nameOfDaysInWeek[$countNameOfDaysInWeek] . '<br>';
            $countNameOfMonths++;

        } while ($countNameOfMonths !== 14);

        return $nameOfMonths;
    }

}

