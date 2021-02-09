<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByHolidaysWorldMonth

{

    public function define($countryID)
    {

        if ($countryID){

            $textID = 243;

        } else{

            $textID = 242;

        }


        return $textID;
    }

}