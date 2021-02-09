<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByHolidaysWorld

{

    public function define($countryID)
    {

        if ($countryID){

            $textID = 241;

        } else{

            $textID = 238;

        }


        return $textID;
    }

}