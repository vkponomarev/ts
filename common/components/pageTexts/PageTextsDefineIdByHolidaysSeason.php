<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByHolidaysSeason

{

    public function define($season)
    {

        if ($season == 'winter'){
            $textID = 277;
        }
        if ($season == 'spring'){
            $textID = 278;
        }
        if ($season == 'summer'){
            $textID = 279;
        }
        if ($season == 'autumn'){
            $textID = 280;
        }


        return $textID;
    }

}