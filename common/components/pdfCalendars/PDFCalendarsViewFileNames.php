<?php

namespace common\components\pdfCalendars;

use Yii;
use yii\web\NotFoundHttpException;

class PDFCalendarsViewFileNames
{

    public function names()
    {
        $names = [
            1 => 'calendar-yearly-portrait-one',
            2 => 'calendar-yearly-landscape-one',
            3 => 'calendar-monthly-portrait-one',
            4 => 'calendar-monthly-landscape-one',
            5 => 'calendar-2monthly-portrait-one',
            6 => 'calendar-2monthly-landscape-one',
            7 => 'calendar-weekly-portrait-one',
            8 => 'calendar-weekly-landscape-one',
            9 => 'calendar-daily-portrait-one',
            10 => 'calendar-daily-landscape-one',
        ];

        return $names;

    }

}
