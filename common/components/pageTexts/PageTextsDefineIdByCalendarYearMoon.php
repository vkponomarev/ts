<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsDefineIdByCalendarYearMoon

{

    public function define($dayNameURL)
    {
        $textID = 99;

        if ($dayNameURL == 'communication'){
            $textID = 100;
        }
        if ($dayNameURL == 'money'){
            $textID = 101;
        }
        if ($dayNameURL == 'bosses'){
            $textID = 102;
        }
        if ($dayNameURL == 'job-change'){
            $textID = 103;
        }
        if ($dayNameURL == 'property'){
            $textID = 104;
        }
        if ($dayNameURL == 'creativity'){
            $textID = 105;
        }
        if ($dayNameURL == 'science'){
            $textID = 106;
        }
        if ($dayNameURL == 'art'){
            $textID = 107;
        }
        if ($dayNameURL == 'education'){
            $textID = 108;
        }
        if ($dayNameURL == 'travel'){
            $textID = 109;
        }
        if ($dayNameURL == 'vacation'){
            $textID = 110;
        }
        if ($dayNameURL == 'celebration'){
            $textID = 111;
        }
        if ($dayNameURL == 'alcohol'){
            $textID = 112;
        }
        if ($dayNameURL == 'dispute'){
            $textID = 113;
        }
        if ($dayNameURL == 'relations'){
            $textID = 114;
        }
        if ($dayNameURL == 'marriage'){
            $textID = 115;
        }
        if ($dayNameURL == 'conception'){
            $textID = 116;
        }
        if ($dayNameURL == 'training'){
            $textID = 117;
        }
        if ($dayNameURL == 'housework'){
            $textID = 118;
        }
        if ($dayNameURL == 'dreams'){
            $textID = 119;
        }
        if ($dayNameURL == 'hair'){
            $textID = 120;
        }
        if ($dayNameURL == 'garden-work'){
            $textID = 121;
        }
        if ($dayNameURL == 'beginning'){
            $textID = 122;
        }


        return $textID;
    }

}