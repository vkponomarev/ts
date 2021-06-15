<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;


use common\componentsV2\time\TimeCitiesByPopulation;

class TimeLocationCities
{

    public $capitals;
    public $byCountry;
    public $byPopulation;
    public $byPopulationSecond;

    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($params, $languageID, $countryData = 0)
    {

        if (isset($countryData) && $countryData) {

            if (isset($params['location']['countryID']) && $params['location']['countryID']) {
                $this->byCountry =
                    new TimeLocationCitiesDateUpdate(
                        new TimeLocationCitiesNameUpdate(
                            new TimeLocationCitiesByCountry($countryData->countryCode, $languageID, 100)
                        ));
            } else {
                $this->byCountry =
                    new TimeLocationCitiesDateUpdate(
                        new TimeLocationCitiesNameUpdate(
                            new TimeLocationCitiesByCountry($countryData->countryCode, $languageID)
                        ));
            }
        }

        if (isset($params['location']['cities']) && $params['location']['cities']) {

            $this->byPopulation =
                (new TimeLocationCitiesDateUpdate(
                    new TimeLocationCitiesNameUpdate(
                        new TimeLocationCitiesByPopulation($languageID)
                    )));

            $this->byPopulationSecond =
                (new TimeLocationCitiesDateUpdate(
                    new TimeLocationCitiesNameUpdate(
                        new TimeLocationCitiesByPopulationSecond($languageID)
                    )));
        }

        if (isset($params['location']['citiesByPopulation']) && $params['location']['citiesByPopulation']) {

            $this->byPopulation =
                (new TimeLocationCitiesDateUpdate(
                    new TimeLocationCitiesNameUpdate(
                        new TimeLocationCitiesByPopulation($languageID)
                    )))->data;

        }

        if (isset($params['location']['capitals']) && $params['location']['capitals']) {
            $this->capitals =
                (new TimeLocationCitiesDateUpdate(
                    new TimeLocationCitiesNameUpdate(
                        new TimeLocationCitiesByCapitals($languageID)
                    )))->data;
        }


    }
}
