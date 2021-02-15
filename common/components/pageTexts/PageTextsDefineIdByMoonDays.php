<?php

namespace common\components\pageTexts;

class PageTextsDefineIdByMoonDays

{

    public function define($dayName, $day)
    {

        if ($dayName <> '') {
            if ($dayName == 'today')
                $textID = 253;
            if ($dayName == 'yesterday')
                $textID = 255;
            if ($dayName == 'tomorrow')
                $textID = 254;
        }

        if ($day <> '')
            $textID = 256;

        return $textID;
    }

}