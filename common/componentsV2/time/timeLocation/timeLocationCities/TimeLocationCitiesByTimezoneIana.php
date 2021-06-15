<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

use Yii;


class TimeLocationCitiesByTimezoneIana
{


    public $data;
    public $languageID;

    public function __construct($timezone, $languageID)
    {
//(new \common\components\dump\Dump())->printR($timezone);die;
        $this->languageID = $languageID;
        if ($timezone) {
            $this->data = Yii::$app->db
                ->createCommand('
            select
            tc.timezone,
            tc.url,
            tc.population,
            tc.name as cityNameOriginal,
            tct.name,
            tct.name_in,
            tct.name_for,
            tcot.name as countryName,
            tco.url as countryUrl
            from
            time_cities as tc
            left join time_cities_text as tct on tc.id = tct.time_cities_id
            left join time_countries as tco on tco.iso_alpha2 = tc.country_code
            left join time_countries_text as tcot on tcot.time_countries_id = tco.id
            where
            tct.languages_id = :languageID
            and 
            tc.timezone = :timezone
            and 
            tcot.languages_id = :languageID
            order by tc.population desc
            limit 20
            ', [':languageID' => $languageID, ':timezone' => $timezone])
                ->queryAll();
        } else {
            $this->data = 0;
        }

    }
}
