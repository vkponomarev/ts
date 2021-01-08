<?php

namespace common\components\date;

use Yii;

class DateByWeek
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

        $yearFirstDay = new \DateTime($yearFull . '-01-01');
        $yearFirstDayNumber = $yearFirstDay->format('N');
        $yearLastDay = new \DateTime($yearFull . '-12-31');
        $yearLastDayNumber = $yearLastDay->format('N');

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

        $weekCount = $date->format('W');
        $weekDayNumber = $date->format('N');

        $dayName = Yii::$app->formatter->asDate($date, 'php:l');
        $dayNameShort = Yii::$app->formatter->asDate($date, 'php:D');
        $dayNumber = $date->format('d');
        $dayNumberSimple = $date->format('j');
        $dayCount = $date->format('z');

        $dateCurrent = $date->format('Y-m-d');
        $date->modify('+1 day');
        $dateNext = $date->format('Y-m-d');
        $date->modify('+1 day');
        $dateAfterNext = $date->format('Y-m-d');
        $date->modify('-3 day');
        $datePrevious = $date->format('Y-m-d');
        $date->modify('-1 day');
        $dateAfterPrevious = $date->format('Y-m-d');

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

        $dateData['date'] = [
            'current' => $dateCurrent,
            'next' => $dateNext,
            'afterNext' => $dateAfterNext,
            'previous' => $datePrevious,
            'afterPrevious' => $dateAfterPrevious,
        ];

        $dateData['year'] = [
            'full' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'short' => str_pad($yearShort, 2, '0', STR_PAD_LEFT),
            'current' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'previous' => str_pad($yearFull - 1, 4, '0', STR_PAD_LEFT),
            'next' => str_pad($yearFull + 1, 4, '0', STR_PAD_LEFT),
            'leap' => $yearLeap,
            'count' => $yearCountDays,
            'firstDay' => $yearFirstDayNumber,
            'lastDay' => $yearLastDayNumber,

        ];

        $dateData['month'] = [
            'full' => $monthFull,
            'short' => $monthShort,
            'number' => $monthNumber,
            'numberSimple' => $monthNumberSimple,
            'countDays' => $monthCountDays,
        ];

        $dateData['week'] = [
            'count' => $weekCount,
            'dayNumber' => $weekDayNumber,

        ];

        $dateData['day'] = [
            'nameFull' => $dayName,
            'nameShort' => $dayNameShort,
            'number' => $dayNumber,
            'numberSimple' => $dayNumberSimple,
            'count' => $dayCount,
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

