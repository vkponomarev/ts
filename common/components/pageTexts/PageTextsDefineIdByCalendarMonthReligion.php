<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarMonthReligion

{

    public function define($religion)
    {

        if ($religion == 'orthodox') {
            $textID = 224;
        }
        if ($religion == 'catholic') {
            $textID = 225;
        }
        if ($religion == 'muslim') {
            $textID = 226;
        }
        if ($religion == 'jewish') {
            $textID = 227;
        }
        if ($religion == 'hindu') {
            $textID = 228;
        }

        return $textID;
    }

}