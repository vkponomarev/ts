<?php

namespace common\componentsV2\time\timeLocation;


use common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCity;
use common\componentsV2\time\timeLocation\timeLocationCountry\TimeLocationCountry;

class TimeLocationDataCityByID
{

    public $data;

    /**
     * TimeLocationDataCityByID constructor.
     * @param $cityID
     * @param $languageID
     * @throws \yii\db\Exception
     */
    public function __construct($cityID, $languageID)
    {

        $this->data = \Yii::$app->db
            ->createCommand('
            select
            tc.id,
            tc.country_code as countryCode,
            tc.timezone,
            tc.url,
            tc.population,
            tc.name as cityNameOriginal,
            tct.name as cityName,
            tct.name_in as cityNameIn,
            tct.name_for as cityNameFor,
            tco.name as countryNameOriginal,
            tco.url as countryUrl,
            tcot.name as countryName,
            tcot.name_in as countryNameIn,
            tcot.name_for as countryNameFor
            from
            time_cities as tc
            left join time_cities_text as tct on tc.id = tct.time_cities_id
            left join time_countries as tco on tc.country_code = tco.iso_alpha2
            left join time_countries_text as tcot on tco.id = tcot.time_countries_id
            where
            tc.id = :cityID
            and
            tct.languages_id = :languageID
            and 
            tcot.languages_id = :languageID
            ', [':languageID' => $languageID, ':cityID' => $cityID])
            ->queryOne();

        // Если русский язык то переводы достаем только для городов больше 745261
        if (($languageID == 1) && ($this->data['population'] < 745261)){
            $this->data['cityName'] = $this->data['cityNameOriginal'];
            $this->data['cityNameIn'] = $this->data['cityNameOriginal'];
            $this->data['cityNameFor'] = $this->data['cityNameOriginal'];
        }

        if (($languageID <> 1)){
            $this->data['cityName'] = $this->data['cityNameOriginal'];
            $this->data['cityNameIn'] = $this->data['cityNameOriginal'];
            $this->data['cityNameFor'] = $this->data['cityNameOriginal'];
        }

    }
}
