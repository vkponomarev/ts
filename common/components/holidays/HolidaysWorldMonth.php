<?php

namespace common\components\holidays;

use Yii;

class HolidaysWorldMonth
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
            where hd.year = :year
            and hd.month = :month
            and ht.languages_id = :languageID
            and ct.languages_id = :languageID
            and htst.languages_id = :languageID
            GROUP BY hd.id
            order BY hd.date
            ', [':languageID' => $languageID, ':year' => $date->year->current, ':month' => $date->month->current])
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
            and hd.month = :month
            and hd.countries_id = :countryID
            and ht.languages_id = :languageID
            and ct.languages_id = :languageID
            and htst.languages_id = :languageID
            GROUP BY hd.id
            order BY hd.date
            ', [':languageID' => $languageID, ':countryID' => $countryID, ':year' => $date->year->current, ':month' => $date->month->current])

                ->queryAll();
            return $holidays;
        }
    }
    /**
     * Предназначенно специально для того чтобы группировать какие либо данные в одну ячейку через запятую как здесь например
     * мы группируем типы праздников для конкретного праздника.
     * GROUP_CONCAT(`ht`.`pdf_official_holidays`) as `off`
     *
     * select
     * holidays_date.id,
     * htxt.name,
     * holidays_date.date,
     * GROUP_CONCAT(`ht`.`pdf_official_holidays`) as `off`
     * from
     * holidays_date
     * left join holidays as h on h.id = holidays_date.holidays_id
     * left join holidays_text as htxt on htxt.holidays_id = h.id
     * left join holidays_date_type as hdt on hdt.holidays_date_id = holidays_date.id
     * left join holidays_types as ht on ht.id = hdt.holidays_type_id
     * where holidays_date.countries_id = 171
     * and holidays_date.year = 2020
     * and htxt.languages_id = 1
     * GROUP BY holidays_date.id
     */
}

