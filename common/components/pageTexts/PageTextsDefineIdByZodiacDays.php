<?php

namespace common\components\pageTexts;

class PageTextsDefineIdByZodiacDays

{

    public function define($dayName, $day)
    {

        if ($dayName <> '') {
            if ($dayName == 'today')
                $textID = 262;
            if ($dayName == 'yesterday')
                $textID = 264;
            if ($dayName == 'tomorrow')
                $textID = 263;
        }

        if ($day <> '')
            $textID = 265;

        return $textID;
    }

}