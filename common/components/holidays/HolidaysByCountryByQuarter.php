<?php

namespace common\components\holidays;

use Yii;

class HolidaysByCountryByQuarter
{

    public function holidays($countryID, $year, $languageID, $quarter)
    {

        if ($quarter == 1){
            $dateStart = $year . '-01-01';
            $dateEnd = $year . '-03-31';
            $condition = "holidays_date.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

        if ($quarter == 2){
            $dateStart = $year . '-04-01';
            $dateEnd = $year . '-06-30';
            $condition = "holidays_date.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

        if ($quarter == 3){
            $dateStart = $year . '-07-01';
            $dateEnd = $year . '-09-30';
            $condition = "holidays_date.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

        if ($quarter == 4){
            $dateStart = $year . '-10-01';
            $dateEnd = $year . '-12-31';
            $condition = "holidays_date.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

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
            and
            '. $condition .'
            and htxt.languages_id = :languageID
            GROUP BY holidays_date.id
            '
                , [':countryID' => $countryID, ':languageID' => $languageID])
            ->queryAll();

        return $holidays;

    }

}

