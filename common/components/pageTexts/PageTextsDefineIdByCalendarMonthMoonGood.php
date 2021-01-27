<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarMonthMoonGood

{

    public function define($dayNameURL)
    {
        $textID = 123;

        if ($dayNameURL == 'communication'){
            $textID = 124;
        }
        if ($dayNameURL == 'money'){
            $textID = 125;
        }
        if ($dayNameURL == 'bosses'){
            $textID = 126;
        }
        if ($dayNameURL == 'job-change'){
            $textID = 127;
        }
        if ($dayNameURL == 'property'){
            $textID = 128;
        }
        if ($dayNameURL == 'creativity'){
            $textID = 129;
        }
        if ($dayNameURL == 'science'){
            $textID = 130;
        }
        if ($dayNameURL == 'art'){
            $textID = 131;
        }
        if ($dayNameURL == 'education'){
            $textID = 132;
        }
        if ($dayNameURL == 'travel'){
            $textID = 133;
        }
        if ($dayNameURL == 'vacation'){
            $textID = 134;
        }
        if ($dayNameURL == 'celebration'){
            $textID = 135;
        }
        if ($dayNameURL == 'alcohol'){
            $textID = 136;
        }
        if ($dayNameURL == 'dispute'){
            $textID = 137;
        }
        if ($dayNameURL == 'relations'){
            $textID = 138;
        }
        if ($dayNameURL == 'marriage'){
            $textID = 139;
        }
        if ($dayNameURL == 'conception'){
            $textID = 140;
        }
        if ($dayNameURL == 'training'){
            $textID = 141;
        }
        if ($dayNameURL == 'housework'){
            $textID = 142;
        }
        if ($dayNameURL == 'dreams'){
            $textID = 143;
        }
        if ($dayNameURL == 'hair'){
            $textID = 144;
        }
        if ($dayNameURL == 'garden-work'){
            $textID = 145;
        }
        if ($dayNameURL == 'beginning'){
            $textID = 146;
        }


        return $textID;
    }

}