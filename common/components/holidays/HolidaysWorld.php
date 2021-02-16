<?php

namespace common\components\holidays;

use Yii;

class HolidaysWorld
{
    /**
     * @param $date \common\componentsV2\date\Date
     * @param $languageID
     * @param $countryID
     * @return array
     * @throws \yii\db\Exception
     */
    public function holidays($date, $languageID, $countryID)
    {

        if (!$countryID) {
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
            where hd.date BETWEEN STR_TO_DATE("' . $date->current . ' 00:00:00", "%Y-%m-%d %H:%i:%s")
            and STR_TO_DATE("' . $date->plusOneMonth . ' 23:59:59", "%Y-%m-%d %H:%i:%s")
            and ht.languages_id = :languageID
            and ct.languages_id = :languageID
            and htst.languages_id = :languageID
            GROUP BY hd.id
            order BY hd.date
            limit 100
            ', [':languageID' => $languageID])
                ->queryAll();

            return $holidays;
        } else {
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
            where hd.year = :year
            and hd.countries_id = :countryID
            and ht.languages_id = :languageID
            and ct.languages_id = :languageID
            and htst.languages_id = :languageID
            GROUP BY hd.id
            order BY hd.date
            limit 100
            ', [':languageID' => $languageID, ':countryID' => $countryID, ':year' => $date->year->current,])
                ->queryAll();
            return $holidays;
        }

    }
}

