<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarYearEastern

{
    /**
     * @param $eastern \common\componentsV2\eastern\Eastern
     * @return int
     */
    public function define($eastern)
    {
        $textID = 230;

        if ($eastern->calendar->startDate == 0){

            $textID = 231;

        }
        return $textID;
    }

}