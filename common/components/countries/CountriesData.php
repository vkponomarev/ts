<?php

namespace common\components\countries;

use Yii;

class CountriesData
{

    public function data($languageID)
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
            ', [':languageID' => $languageID])
            ->queryAll();

        return $data;
    }
}

