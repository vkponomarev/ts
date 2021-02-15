<?php

namespace common\components\pageTexts;

class PageTextsDefineIdByMoonDaysPhases

{

    public function define($dayName, $day)
    {

        if ($dayName <> '') {
            if ($dayName == 'today')
                $textID = 257;
            if ($dayName == 'yesterday')
                $textID = 259;
            if ($dayName == 'tomorrow')
                $textID = 258;
        }

        if ($day <> '')
            $textID = 260;

        return $textID;
    }

}