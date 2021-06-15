<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

use Yii;
use yii\web\NotFoundHttpException;


class TimeLocationCitiesByPopulation
{


    public $data;
    public $languageID;

    public function __construct($languageID, $limit = 15)
    {

        $this->languageID = $languageID;
        $this->data = Yii::$app->db
            ->createCommand('
            select
            tc.timezone,
            tc.url,
            tc.population,
            tc.name as cityNameOriginal,
            tct.name,
            tct.name_in,
            tct.name_for
            from
            time_cities as tc
            left join time_cities_text as tct on tc.id = tct.time_cities_id
            where
            tct.languages_id = :languageID
            order by tc.population desc
            limit :limit
            ', [':languageID' => $languageID, ':limit' => $limit])
            ->queryAll();
    }
}
