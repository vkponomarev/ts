<?php

namespace common\components\city;

use Yii;


class CityByMoonCalendar
{

    public function data($languageID, $citiesID)
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            cities.id,
            cities.ascii_name as name,
            cities.latitude,
            cities.longitude
            from
            cities
            where
            cities.id = :citiesID
            ', [':citiesID' => $citiesID])
            ->queryOne();

        return $data;
    }
}

