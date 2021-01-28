<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarMonthMoonPhases

{

    public function define($phaseNameURL)
    {

        if ($phaseNameURL == 'new-moon'){
            $textID = 204;
        }
        if ($phaseNameURL == 'waxing-moon'){
            $textID = 205;
        }
        if ($phaseNameURL == 'full-moon'){
            $textID = 206;
        }
        if ($phaseNameURL == 'waning-moon'){
            $textID = 207;
        }

        return $textID;
    }

}