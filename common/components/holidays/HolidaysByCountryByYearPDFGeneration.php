<?php

namespace common\components\holidays;

use Yii;

class HolidaysByCountryByYearPDFGeneration
{

    public function holidays($countryID, $yearID, $languageID)
    {

        $holidays = Yii::$app->db
            ->createCommand('
            select
            holidays_date.id,
            htxt.name,
            holidays_date.date,
            GROUP_CONCAT(`ht`.`pdf_official_holidays`) as `holiday`,
            GROUP_CONCAT(`ht`.`name`) as `holiday_types`
            from
            holidays_date
            left join holidays as h on h.id = holidays_date.holidays_id 
            left join holidays_text as htxt on htxt.holidays_id = h.id
            left join holidays_date_type as hdt on hdt.holidays_date_id = holidays_date.id
            left join holidays_types as ht on ht.id = hdt.holidays_type_id     
            where holidays_date.countries_id = :countryID
            and holidays_date.year = :yearID
            and htxt.languages_id = :languageID
            and ht.pdf_official_holidays = 1
            GROUP BY holidays_date.id
            '
                , [':countryID' => $countryID, ':yearID' => $yearID, ':languageID' => $languageID])
            ->queryAll();

        //echo '<pre>';
        //var_dump($texts);
        //print_r($languageId);
        //echo '</pre>';

        return $holidays;

    }

}

