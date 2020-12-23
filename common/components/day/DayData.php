<?php

namespace common\components\day;

use Yii;

class DayData
{

    public function data($date)
    {
        $date = new \DateTime($date);
        $dateCurrent = Yii::$app->formatter->asDate($date, 'yyyy-MM-dd');

        $datePrevious = $date->modify('-1 day');
        $datePrevious = Yii::$app->formatter->asDate($datePrevious, 'yyyy-MM-dd');

        $datePreviousSecond = $date->modify('-1 day');
        $datePreviousSecond = Yii::$app->formatter->asDate($datePreviousSecond, 'yyyy-MM-dd');

        $dateNext = $date->modify('+3 day');
        $dateNext = Yii::$app->formatter->asDate($dateNext, 'yyyy-MM-dd');

        $dateNextSecond = $date->modify('+1 day');
        $dateNextSecond = Yii::$app->formatter->asDate($dateNextSecond, 'yyyy-MM-dd');

        return [
            'current' => $dateCurrent,
            'previous' => $datePrevious,
            'previousSecond' => $datePreviousSecond,
            'next' => $dateNext,
            'nextSecond' => $dateNextSecond
        ];

    }

}

