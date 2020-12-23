<?php

namespace common\components\calendar;

use Yii;

class CalendarTest
{

    public function calendar($year)
    {
        $firstMonth = new \DateTime();
        $firstMonth = new \DateTime($firstMonth->format('Y-m-15'));
        $firstMonth->modify('-1 month');
        $countNameOfMonths = 0;
        $nameOfMonths = array();

        do {

            $nameOfMonths[$countNameOfMonths] = Yii::$app->formatter->asDate($firstMonth, 'LLLL Y');
            $firstMonth->modify('+1 month');
            //echo $nameOfDaysInWeek[$countNameOfDaysInWeek] . '<br>';
            $countNameOfMonths++;

        } while ($countNameOfMonths !== 13);

        return $nameOfMonths;
    }

}

