<?php

namespace common\components\holidays;

use Yii;

class HolidaysByCountryByYear
{

    public function holidays($countryID, $year, $languageID)
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
            and holidays_date.year = :year
            and htxt.languages_id = :languageID
            GROUP BY holidays_date.id
            '
                , [':countryID' => $countryID, ':year' => $year, ':languageID' => $languageID])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($holidays);
        //die;
        return $holidays;

    }
    /**
     * Предназначенно специально для того чтобы группировать какие либо данные в одну ячейку через запятую как здесь например
     * мы группируем типы праздников для конкретного праздника.
     * GROUP_CONCAT(`ht`.`pdf_official_holidays`) as `off`
     *
     * select
    holidays_date.id,
    htxt.name,
    holidays_date.date,
    GROUP_CONCAT(`ht`.`pdf_official_holidays`) as `off`
    from
    holidays_date
    left join holidays as h on h.id = holidays_date.holidays_id
    left join holidays_text as htxt on htxt.holidays_id = h.id
    left join holidays_date_type as hdt on hdt.holidays_date_id = holidays_date.id
    left join holidays_types as ht on ht.id = hdt.holidays_type_id
    where holidays_date.countries_id = 171
    and holidays_date.year = 2020
    and htxt.languages_id = 1
    GROUP BY holidays_date.id
     */
}

