<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarYearMoonPhases

{

    public function define($phaseNameURL)
    {

        if ($phaseNameURL == 'new-moon'){
            $textID = 199;
        }
        if ($phaseNameURL == 'waxing-moon'){
            $textID = 200;
        }
        if ($phaseNameURL == 'full-moon'){
            $textID = 201;
        }
        if ($phaseNameURL == 'waning-moon'){
            $textID = 202;
        }

        return $textID;
    }

}