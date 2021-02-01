<?php

namespace common\components\holidays;

use Yii;

class HolidaysByReligion
{

    public function holidays($year, $languageID, $religion)
    {

        $religions = ['orthodox', 'catholic', 'muslim', 'jewish', 'hindu'];

        if ($religion == 'orthodox') {
            $condition = 'ht.orthodox = 1';
            $field = 'orthodox';
        }
        if ($religion == 'catholic') {
            $condition = 'ht.catholic = 1';
            $field = 'catholic';
        }
        if ($religion == 'muslim') {
            $condition = 'ht.muslim = 1';
            $field = 'muslim';
        }
        if ($religion == 'jewish') {
            $condition = 'ht.jewish = 1';
            $field = 'jewish';
        }
        if ($religion == 'hindu') {
            $condition = 'ht.hindu = 1';
            $field = 'hindu';
        }

        $holidays = Yii::$app->db
            ->createCommand('
            select
            holidays_date.id,
            htxt.name,
            holidays_date.date,
            GROUP_CONCAT(`ht`.`' . $field . '`) as `holiday`,
            GROUP_CONCAT(`ht`.`name`) as `holiday_types`
            from
            holidays_date
            left join holidays as h on h.id = holidays_date.holidays_id 
            left join holidays_text as htxt on htxt.holidays_id = h.id
            left join holidays_date_type as hdt on hdt.holidays_date_id = holidays_date.id
            left join holidays_types as ht on ht.id = hdt.holidays_type_id
            where 
            holidays_date.year = :year
            and htxt.languages_id = :languageID
            and ' . $condition . '
            GROUP BY holidays_date.date
            ORDER BY holidays_date.date
            '
                , [':year' => $year, ':languageID' => $languageID])
            ->queryAll();


        return $holidays;

    }

    /*
     * $holidays = Yii::$app->db
            ->createCommand('
            select
            holidays_date.id,
            htxt.name,
            holidays_date.date,
            ct.name as countyName,
            GROUP_CONCAT(`ht`.`' . $field . '`) as `holiday`,
            GROUP_CONCAT(`ht`.`name`) as `holiday_types`
            from
            holidays_date
            left join holidays as h on h.id = holidays_date.holidays_id
            left join holidays_text as htxt on htxt.holidays_id = h.id
            left join holidays_date_type as hdt on hdt.holidays_date_id = holidays_date.id
            left join holidays_types as ht on ht.id = hdt.holidays_type_id
            left join countries as c on c.id = holidays_date.countries_id
            left join countries_text as ct on ct.countries_id = c.id
            where
            holidays_date.year = :year
            and htxt.languages_id = :languageID
            and ct.languages_id = :languageID
            and ' . $condition . '

            ORDER BY holidays_date.date
            '
                , [':year' => $year, ':languageID' => $languageID])
            ->queryAll();
     * */

}

