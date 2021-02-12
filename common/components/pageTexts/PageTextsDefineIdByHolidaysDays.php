<?php

namespace common\components\pageTexts;

class PageTextsDefineIdByHolidaysDays

{

    public function define($dayName, $day, $countryID)
    {

        if ($dayName <> '') {
            if ($dayName == 'today')
                if ($countryID)
                    $textID = 250;
                else
                    $textID = 247;

            if ($dayName == 'yesterday')
                $textID = 248;

            if ($dayName == 'tomorrow')
                $textID = 249;

        }

        if ($day <> '')
            $textID = 251;

        return $textID;
    }

}