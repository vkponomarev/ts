<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckHolidaysNameCountry
{


    function check($holidayID, $countryID)
    {

        if ($countryID) {

            $holiday = \Yii::$app->db
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

            if (!$holiday) {
                throw new NotFoundHttpException('404');
            }
        }

    }

}
