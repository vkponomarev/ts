<?php

namespace common\componentsV2\time\timeLocation\timeLocationCountries;

use Yii;
class TimeLocationCountriesAndCitiesByPopulation
{

    public $data;
    public $languageID;
    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($languageID)
    {
        $this->languageID = $languageID;
        $countries = Yii::$app->db
            ->createCommand('
            select
            tc.iso_alpha2 as countryCode,
            tc.url,
            tc.name as countryNameOriginal,
            tct.name as name,
            tct.name_in as nameIn,
            tct.name_for as nameFor
            from time_countries as tc
            left join time_countries_text as tct on tct.time_countries_id = tc.id
            where
            tct.languages_id = :languageID
            ORDER BY tc.population desc 
            limit 20
            
            ', [':languageID' => $languageID])
            ->queryAll();

        foreach ($countries as $key => $country) {
            $cities = Yii::$app->db
                ->createCommand('
                select
                tc.url,
                tc.timezone,
                tc.population,
                tc.name as cityNameOriginal,
                tct.name as name,
                tct.name_in as nameIn,
                tct.name_for as nameFor
                from time_cities as tc
                join time_cities_text as tct on tct.time_cities_id = tc.id
                where
                tc.country_code = :countryCode
                and
                tct.languages_id = :languageID
                ORDER BY tc.population desc 
                limit 4
                ', [':languageID' => $languageID, ':countryCode' => $country['countryCode']])
                ->queryAll();
            $countries[$key]['cities'] =  $cities;
        }

        $this->data = $countries;

    }
}
