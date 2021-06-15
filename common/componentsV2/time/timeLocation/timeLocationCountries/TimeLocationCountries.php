<?php

namespace common\componentsV2\time\timeLocation\timeLocationCountries;


class TimeLocationCountries
{


    public $data;

    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($params, $languageID)
    {
        if (isset($params['location']['countries']) && $params['location']['countries']) {
            $this->data =
                (new TimeLocationCountriesAndCitiesDateUpdate(
                    new TimeLocationCountriesAndCitiesNameUpdate(
                        new TimeLocationCountriesAndCitiesByPopulation($languageID)
                    )))->data;
        }

        if (isset($params['location']['continent']) && $params['location']['continent']) {
            $this->data =
                (new TimeLocationCountriesAndCitiesDateUpdate(
                    new TimeLocationCountriesAndCitiesNameUpdate(
                        new TimeLocationCountriesAndCitiesByContinent($params['location']['continentCode'], $languageID)
                    )))->data;
        }
    }
}
