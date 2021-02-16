<?php

namespace common\components\holidays;

use Yii;

class HolidaysBySeason
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @param $languageID
     * @param $season
     * @return array
     * @throws \yii\db\Exception
     */
    public function holidays($date, $languageID, $season)
    {
        if ($season == 'winter'){
            $dateStart = $date->year->current-1 . '-12-01';
            $dateEnd = $date->year->current . '-02-28';
            $condition = "hd.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

        if ($season == 'spring'){
            $dateStart = $date->year->current . '-03-01';
            $dateEnd = $date->year->current . '-05-31';
            $condition = "hd.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

        if ($season == 'summer'){
            $dateStart = $date->year->current . '-06-01';
            $dateEnd = $date->year->current . '-08-31';
            $condition = "hd.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

        if ($season == 'autumn'){
            $dateStart = $date->year->current . '-09-01';
            $dateEnd = $date->year->current . '-11-30';
            $condition = "hd.date BETWEEN STR_TO_DATE('" . $dateStart . " 00:00:00', '%Y-%m-%d %H:%i:%s')
             and STR_TO_DATE('" . $dateEnd . " 23:59:59', '%Y-%m-%d %H:%i:%s')";
        }

            $holidays = Yii::$app->db
                ->createCommand('
            select
            hd.id,
            hd.holidays_name,
            hd.date,
            ht.name as holidayName,
            ct.name as countryName,
            c.url as countryUrl,
            h.url as holidayUrl,
            GROUP_CONCAT(`htst`.`name`) as `holidayTypeName`
            from
            holidays_date as hd
            left join holidays as h on h.id = hd.holidays_id
            left join holidays_text as ht on ht.holidays_id = h.id
            left join countries as c on c.id = hd.countries_id
            left join countries_text as ct on ct.countries_id = c.id
            left join holidays_date_type as hdt on hdt.holidays_date_id = hd.id
            left join holidays_types as hts on hts.id = hdt.holidays_type_id  
            left join holidays_types_text as htst on htst.holidays_types_id = hts.id  
            where 
            ' . $condition . '
            and ht.languages_id = :languageID
            and ct.languages_id = :languageID
            and htst.languages_id = :languageID
            GROUP BY hd.id
            order BY hd.date
            limit 100
            ', [':languageID' => $languageID])
                ->queryAll();

            return $holidays;


    }
}

