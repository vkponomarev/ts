<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarSeason

{

    public function define($holidays, $calendarChinese)
    {
        $textID = 78;

        if ($holidays && $calendarChinese['active']){

            $textID = 79;

        }

        if (!$holidays && !$calendarChinese['active']){

            $textID = 78;

        }

        if ($holidays && !$calendarChinese['active']){

            $textID = 80;

        }

        if (!$holidays && $calendarChinese['active']){

            $textID = 81;

        }

        return $textID;
    }

}