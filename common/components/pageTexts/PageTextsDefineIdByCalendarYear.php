<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarYear

{

    public function define($holidays, $calendarChinese)
    {
        $textID = 74;

        if ($holidays && $calendarChinese['active']){

            $textID = 75;

        }

        if (!$holidays && !$calendarChinese['active']){

            $textID = 74;

        }

        if ($holidays && !$calendarChinese['active']){

            $textID = 76;

        }

        if (!$holidays && $calendarChinese['active']){

            $textID = 77;

        }

        return $textID;
    }

}