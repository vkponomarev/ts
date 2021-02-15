<?php

namespace common\components\pageTexts;

class PageTextsDefineIdByCalendarDays

{

    public function define($dayName, $day)
    {

        if ($dayName <> '') {
            if ($dayName == 'today')
                $textID = 267;
            if ($dayName == 'yesterday')
                $textID = 269;
            if ($dayName == 'tomorrow')
                $textID = 268;
        }

        if ($day <> '')
            $textID = 270;

        return $textID;
    }

}