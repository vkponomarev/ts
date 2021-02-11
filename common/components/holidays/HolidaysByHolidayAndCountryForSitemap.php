<?php

namespace common\components\holidays;

use Yii;

class HolidaysByHolidayAndCountryForSitemap
{

    public function holidays($holidayID, $countryID)
    {

        $holidays = \Yii::$app->db
            ->createCommand('
            select
            id
            from
            holidays_date
            where 
            holidays_id = :holidayid
            and
            countries_id = :countryID
            ', [':holidayid' => $holidayID, ':countryID' => $countryID])
            ->queryOne();

        return $holidays;


    }

}

