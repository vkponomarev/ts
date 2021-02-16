<?php

namespace common\components\holidays;

use Yii;
use yii\data\SqlDataProvider;

class __HolidaysWorld
{

    /**
     * @param $date \common\componentsV2\date\Date
     * @param $languageID
     * @param $countryID
     * @param $pageSize
     * @return SqlDataProvider
     * @throws \yii\db\Exception
     */
    public function holidays($date, $languageID, $countryID, $pageSize)
    {

        if (!$countryID) {

            $count = Yii::$app->db->createCommand('
            SELECT
            count(id) as count
            from
            holidays_date
            where holidays_date.date BETWEEN STR_TO_DATE("' . $date->current . ' 00:00:00", "%Y-%m-%d %H:%i:%s")
            and STR_TO_DATE("' . $date->year->current . '-12-31 23:59:59", "%Y-%m-%d %H:%i:%s")
            ')->queryOne();


            $holidays = new SqlDataProvider([
                'sql' => '       
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
                and STR_TO_DATE("' . $date->year->current . '-12-31 23:59:59", "%Y-%m-%d %H:%i:%s")
                and ht.languages_id = :languageID
                and ct.languages_id = :languageID
                and htst.languages_id = :languageID
                GROUP BY hd.id
                order BY hd.date
                ',
                'params' => [':languageID' => $languageID],
                'totalCount' => $count['count'],
                'pagination' => [
                    'pageSize' => $pageSize,
                ],
                //'sort' => [
                //    'attributes' => [
                //        '',
                //'view_count',
                //'created_at',
                //   ],
                //],
            ]);

            return $holidays;

        } else {

            $count = Yii::$app->db->createCommand('
            SELECT
            count(id) as count
            from
            holidays_date
            where holidays_date.year = :year
            ', [':year' => $date->year->current])->queryOne();

            $holidays = new SqlDataProvider([
                'sql' => '    
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
            ',
                'params' => [':languageID' => $languageID, ':countryID' => $countryID, ':year' => $date->year->current],
                'totalCount' => $count['count'],
                'pagination' => [
                    'pageSize' => $pageSize,
                ],
                //'sort' => [
                //    'attributes' => [
                //        '',
                //'view_count',
                //'created_at',
                //   ],
                //],
            ]);

            return $holidays;
        }
    }

}

