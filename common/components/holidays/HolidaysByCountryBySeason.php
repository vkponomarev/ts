<?php

namespace common\components\holidays;

use Yii;

class HolidaysByCountryBySeason
{

    public function holidays($countryID, $year, $languageID, $season)
    {

        if ($season == 'winter'){
            $dateStart = $year-1 . '-12-01';
            $dateEnd = $year . '-02-28';
            $condition = "holidays_date.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

        if ($season == 'spring'){
            $dateStart = $year . '-03-01';
            $dateEnd = $year . '-05-31';
            $condition = "holidays_date.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

        if ($season == 'summer'){
            $dateStart = $year . '-06-01';
            $dateEnd = $year . '-08-31';
            $condition = "holidays_date.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

        if ($season == 'autumn'){
            $dateStart = $year . '-09-01';
            $dateEnd = $year . '-11-30';
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

