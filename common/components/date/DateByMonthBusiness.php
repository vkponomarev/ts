<?php

namespace common\components\date;

use Yii;
use yii\web\NotFoundHttpException;


class DateByMonthBusiness
{

    public function data($date)
    {

        if ($date) {
            $date = new \DateTime($date);
        } else {
            $date = new \DateTime();
        }

        $yearFull = $date->format('Y');
        $yearShort = $date->format('y');
        $yearLeap = $date->format('L');
        $yearLastDay = new \DateTime($yearFull . '-12-31');

        if ($yearLeap){
            $yearCountDays = 366;
            $februaryCountDays = 29;
        } else {
            $yearCountDays = 365;
            $februaryCountDays = 28;
        }

        $monthFull = Yii::$app->formatter->asDate($date, 'php:F');
        $monthShort = Yii::$app->formatter->asDate($date, 'php:M');
        $monthNumber = $date->format('m');
        $monthNumberSimple = $date->format('n');
        $monthCountDays = $date->format('t');

        $monthFirstDay = new \DateTime($yearFull . '-' . $monthNumber . '-01');
        $monthFirstDayNumber = $monthFirstDay->format('N');
        $monthLastDay = new \DateTime($yearFull . '-' . $monthNumber . '-' . $monthCountDays);
        $monthLastDayNumber = $monthLastDay->format('N');

        $weekCountNow = $date->format('W');
        $weekDayNumber = $date->format('N');
        $weekCount = $yearLastDay->format('W');

        $dateData['year'] = [
            'full' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'short' => str_pad($yearShort, 2, '0', STR_PAD_LEFT),
            'current' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'previous' => str_pad($yearFull - 1, 4, '0', STR_PAD_LEFT),
            'next' => str_pad($yearFull + 1, 4, '0', STR_PAD_LEFT),
            'leap' => $yearLeap,
            'count' => $yearCountDays,

        ];

        $dateData['month'] = [
            'full' => $monthFull,
            'short' => $monthShort,
            'number' => $monthNumber,
            'numberSimple' => $monthNumberSimple,
            'countDays' => $monthCountDays,
            'firstDay' => $monthFirstDayNumber,
            'lastDay' => $monthLastDayNumber,
        ];

        $dateData['week'] = [
            'count' => $weekCount,
            'dayNumber' => $weekDayNumber,
            'now' => $weekCountNow,
        ];

        return $dateData;
    }




}

