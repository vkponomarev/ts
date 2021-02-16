<?php

namespace common\components\pageTexts;

class PageTextsDefineIdByWeeksDays

{

    public function define($dayName, $day)
    {

        if ($dayName <> '') {
            if ($dayName == 'today')
                $textID = 272;
            if ($dayName == 'yesterday')
                $textID = 274;
            if ($dayName == 'tomorrow')
                $textID = 273;
        }

        if ($day <> '')
            $textID = 275;

        return $textID;
    }

}