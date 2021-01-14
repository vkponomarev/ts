<?php

namespace common\components\date;

use Yii;
use yii\web\NotFoundHttpException;


class DateByQuarter
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
        } else {
            $yearCountDays = 365;
        }

        $quarterOneFirstDay = new \DateTime($yearFull . '-01-01');
        $quarterOneFirstDayNumber = $quarterOneFirstDay->format('N');
        $quarterOneLastDay = new \DateTime($yearFull . '-03-31');
        $quarterOneLastDayNumber = $quarterOneLastDay->format('N');

        $quarterTwoFirstDay = new \DateTime($yearFull . '-04-01');
        $quarterTwoFirstDayNumber = $quarterTwoFirstDay->format('N');
        $quarterTwoLastDay = new \DateTime($yearFull . '-06-30');
        $quarterTwoLastDayNumber = $quarterTwoLastDay->format('N');

        $quarterThreeFirstDay = new \DateTime($yearFull . '-07-01');
        $quarterThreeFirstDayNumber = $quarterThreeFirstDay->format('N');
        $quarterThreeLastDay = new \DateTime($yearFull . '-09-30');
        $quarterThreeLastDayNumber = $quarterThreeLastDay->format('N');

        $quarterFourFirstDay = new \DateTime($yearFull . '-10-01');
        $quarterFourFirstDayNumber = $quarterFourFirstDay->format('N');
        $quarterFourLastDay = new \DateTime($yearFull . '-12-31');
        $quarterFourLastDayNumber = $quarterFourLastDay->format('N');

        $dateData['year'] = [
            'full' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'short' => str_pad($yearShort, 2, '0', STR_PAD_LEFT),
            'current' => str_pad($yearFull, 4, '0', STR_PAD_LEFT),
            'previous' => str_pad($yearFull - 1, 4, '0', STR_PAD_LEFT),
            'next' => str_pad($yearFull + 1, 4, '0', STR_PAD_LEFT),
            'leap' => $yearLeap,
            'count' => $yearCountDays,
        ];

        $dateData['quarter'][1] = [
            'firstDay' => $quarterOneFirstDayNumber,
            'lastDay' => $quarterOneLastDayNumber,
        ];

        $dateData['quarter'][2] = [
            'firstDay' => $quarterTwoFirstDayNumber,
            'lastDay' => $quarterTwoLastDayNumber,
        ];

        $dateData['quarter'][3] = [
            'firstDay' => $quarterThreeFirstDayNumber,
            'lastDay' => $quarterThreeLastDayNumber,
        ];

        $dateData['quarter'][4] = [
            'firstDay' => $quarterFourFirstDayNumber,
            'lastDay' => $quarterFourLastDayNumber,
        ];


        return $dateData;
    }




}

