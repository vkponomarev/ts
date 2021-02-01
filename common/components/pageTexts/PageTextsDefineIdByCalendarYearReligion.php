<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarYearReligion

{

    public function define($religion)
    {

        if ($religion == 'orthodox') {
            $textID = 219;
        }
        if ($religion == 'catholic') {
            $textID = 220;
        }
        if ($religion == 'muslim') {
            $textID = 221;
        }
        if ($religion == 'jewish') {
            $textID = 222;
        }
        if ($religion == 'hindu') {
            $textID = 223;
        }

        return $textID;
    }

}