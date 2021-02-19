<?php

namespace common\components\holiday;

use Yii;

class HolidayByID
{

    public function data($holidayID, $languageID)
    {
        $data = Yii::$app->db
            ->createCommand('
            select
            h.id,
            h.url,
            h.name as holidayNameOriginal,
            htxt.name as holidayName
            from
            holidays as h
            left join holidays_text as htxt on htxt.holidays_id = h.id
            where 
            h.id = :holidayID
            and 
            htxt.languages_id = :languageID
            ', [':holidayID' => $holidayID, ':languageID' => $languageID])
            ->queryOne();

        return $data;

    }

}

