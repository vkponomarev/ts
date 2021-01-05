<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarMonth

{

    public function define($holidays, $PDFCalendar)
    {
        $textID = 85;

        if ($holidays && $PDFCalendar['exists']){

            $textID = 86;

        }

        if (!$holidays && !$PDFCalendar['exists']){

            $textID = 85;

        }

        if ($holidays && !$PDFCalendar['exists']){

            $textID = 87;

        }

        if (!$holidays && $PDFCalendar['exists']){

            $textID = 88;

        }

        return $textID;
    }

}