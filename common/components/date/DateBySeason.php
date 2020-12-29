<?php

namespace common\components\date;

use Yii;
use yii\web\NotFoundHttpException;


class DateBySeason
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

        if ($yearLeap){
            $yearCountDays = 366;
            $februaryCountDays = 29;
        } else {
            $yearCountDays = 365;
            $februaryCountDays = 28;
        }

        $winterFirstDay = new \DateTime($yearFull - 1 . '-12-01');
        $winterFirstDayNumber = $winterFirstDay->format('N');
        $winterLastDay = new \DateTime($yearFull . '-02-' . $februaryCountDays);
        $winterLastDayNumber = $winterLastDay->format('N');

        $springFirstDay = new \DateTime($yearFull . '-03-01');
        $springFirstDayNumber = $springFirstDay->format('N');
        $springLastDay = new \DateTime($yearFull . '-05-31');
        $springLastDayNumber = $springLastDay->format('N');

        $summerFirstDay = new \DateTime($yearFull . '-06-01');
        $summerFirstDayNumber = $summerFirstDay->format('N');
        $summerLastDay = new \DateTime($yearFull . '-08-31');
        $summerLastDayNumber = $summerLastDay->format('N');

        $autumnFirstDay = new \DateTime($yearFull . '-09-01');
        $autumnFirstDayNumber = $autumnFirstDay->format('N');
        $autumnLastDay = new \DateTime($yearFull . '-11-30');
        $autumnLastDayNumber = $autumnLastDay->format('N');

        $dateData['year'] = [
            'full' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'short' => str_pad($yearShort, 2, '0', STR_PAD_LEFT),
            'current' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'previous' => str_pad($yearFull - 1, 4, '0', STR_PAD_LEFT),
            'next' => str_pad($yearFull + 1, 4, '0', STR_PAD_LEFT),
            'leap' => $yearLeap,
            'count' => $yearCountDays,

        ];

        $dateData['season']['winter'] = [
            'firstDay' => $winterFirstDayNumber,
            'lastDay' => $winterLastDayNumber,
        ];

        $dateData['season']['spring'] = [
            'firstDay' => $springFirstDayNumber,
            'lastDay' => $springLastDayNumber,
        ];

        $dateData['season']['summer'] = [
            'firstDay' => $summerFirstDayNumber,
            'lastDay' => $summerLastDayNumber,
        ];

        $dateData['season']['autumn'] = [
            'firstDay' => $autumnFirstDayNumber,
            'lastDay' => $autumnLastDayNumber,
        ];


        return $dateData;
    }




}

