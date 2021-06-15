<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

use Yii;
use yii\web\NotFoundHttpException;


class TimeLocationCitiesByCapitals
{


    public $data;
    public $languageID;
    public function __construct($languageID)
    {
        $this->languageID = $languageID;
        $this->data = Yii::$app->db
            ->createCommand('
            select
            tcot.name as countryName,
            t.url as countryUrl,
            tc.timezone,
            tc.url,
            tc.population,
            tc.name as cityNameOriginal,
            tct.name as name,
            tct.name_in as nameIn,
            tct.name_for as nameFor
            from
            time_countries as t
            left join time_countries_text as tcot on tcot.time_countries_id = t.id
            left join time_cities as tc on t.capital_id = tc.id
            left join time_cities_text as tct on tc.id = tct.time_cities_id
            where
            tct.languages_id = :languageID
            and
            tcot.languages_id = :languageID
            order by tc.population desc
            ', [':languageID' => $languageID])
            ->queryAll();
    }
}
