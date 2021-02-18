<?php

namespace common\components\countries;

use Yii;


class CountriesByPopulation
{

    public function countries($languageID)
    {

        $countries = Yii::$app->db
            ->createCommand('
            select
            cs.url,
            cst.name,
            cst.name_in,
            cst.name_for
            from
            country
            left join countries as cs on cs.name = country.name
            left join countries_text as cst on cst.countries_id = cs.id
            where cst.languages_id = :languageID
            order by population DESC
            limit 16
            ',[':languageID'=>$languageID])
            ->queryAll();

        return $countries;
    }
}

