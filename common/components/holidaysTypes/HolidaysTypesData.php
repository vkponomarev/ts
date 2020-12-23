<?php

namespace common\components\holidaysTypes;

use Yii;

class HolidaysTypesData
{

    public function data($countryID, $year, $languageID)
    {

        $holidays = Yii::$app->db
            ->createCommand('
            select
            holidays_date.id,
            holidays_date.date,
            ht.name as htName,
            ht.pdf_official_holidays as holiday
            from
            holidays_date
            left join holidays_date_type as hdt on hdt.holidays_date_id = holidays_date.id
            left join holidays_types as ht on ht.id = hdt.holidays_type_id      
            where holidays_date.countries_id = :countryID
            and holidays_date.year = :year
            ' , [':countryID' => $countryID, ':year' => $year
            //, ':languageID' => $languageID
            ])
            ->queryAll();


        return $holidays;

    }


}

