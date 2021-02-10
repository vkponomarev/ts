<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByHolidaysHoliday

{

    public function define($countryID)
    {

        if ($countryID){

            $textID = 245;

        } else{

            $textID = 244;

        }
        return $textID;
    }

}