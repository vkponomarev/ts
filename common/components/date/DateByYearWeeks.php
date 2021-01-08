<?php

namespace common\components\date;

use Yii;

class DateByYearWeeks
{

    public function data($date)
    {

        if ($date) {
            $date = new \DateTime($date);
        } else {
            $date = new \DateTime();
        }

        $dateNow = new \DateTime();

        $yearFull = $date->format('Y');
        $yearFullNow = $dateNow->format('Y');
        $yearLastDay = new \DateTime($yearFull . '-12-31');

        $weekCountNow = $dateNow->format('W');
        $weekDayNumber = $date->format('N');
        $weekCount = $yearLastDay->format('W');

        if ($weekCount == '01'){
            $yearLastDay->modify('-6 day');
            $weekCount = $yearLastDay->format('W');
        } 
        
        $dateData['year'] = [
            'full' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'current' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'previous' => str_pad($yearFull - 1, 4, '0', STR_PAD_LEFT),
            'next' => str_pad($yearFull + 1, 4, '0', STR_PAD_LEFT),
            'now' => str_pad($yearFullNow, 4, '0', STR_PAD_LEFT),
        ];

        $dateData['week'] = [
            'count' => $weekCount,
            'dayNumber' => $weekDayNumber,
            'now' => $weekCountNow,
        ];

        $monthFull = Yii::$app->formatter->asDate($dateNow, 'php:F');
        $monthShort = Yii::$app->formatter->asDate($dateNow, 'php:M');
        $monthNumber = $date->format('m');
        $monthNumberSimple = $date->format('n');
        $monthCountDays = $date->format('t');

        $dateData['month'] = [
            'full' => $monthFull,
            'short' => $monthShort,
            'number' => $monthNumber,
            'numberSimple' => $monthNumberSimple,
            'countDays' => $monthCountDays,
        ];

        return $dateData;
    }
}

