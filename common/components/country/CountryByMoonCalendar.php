<?php

namespace common\components\country;

use Yii;


class CountryByMoonCalendar
{

    public function data($languageID, $countriesID)
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            countries.id,
            countries.url,
            ct.name,
            ct.name_in,
            ct.name_for
            from
            countries
            left join countries_text as ct on ct.countries_id = countries.id
            where ct.languages_id = :languageID
            and 
            countries.id = :countriesID
            ', [':languageID' => $languageID, ':countriesID' => $countriesID])
            ->queryOne();

        return $data;
    }
}

