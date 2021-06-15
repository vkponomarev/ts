<?php

namespace common\componentsV2\time\timeLocation;


use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCities;
use common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCity;
use common\componentsV2\time\timeLocation\timeLocationContinent\TimeLocationContinent;
use common\componentsV2\time\timeLocation\timeLocationContinents\TimeLocationContinents;
use common\componentsV2\time\timeLocation\timeLocationCountries\TimeLocationCountries;
use common\componentsV2\time\timeLocation\timeLocationCountry\TimeLocationCountry;
use common\componentsV2\time\timeLocation\timeLocationCountry\TimeLocationCountryTextUpdate;

class TimeLocation
{

    public $city;
    public $cities;
    public $citiesByPopulation;
    public $countries;
    public $countryByCity;
    public $citiesByCountry;
    public $country;
    public $continents;
    public $continent;
    public $geoNameData;
    private $locationData;

    /**
     * TimeLocation constructor.
     * @param $params
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($params, $languageID)
    {


        if (isset($params['location']['cityID']) && $params['location']['cityID']) {

            $this->locationData =
                new TimeLocationData(['cityID' => $params['location']['cityID']], $languageID);

            $this->city =
                new TimeLocationCity($this->locationData, $languageID);

            $this->country =
                new TimeLocationCountry($this->locationData, $languageID);

            $this->cities =
                new TimeLocationCities($params, $languageID, $this->country);

        }

        if (isset($params['location']['cities']) && $params['location']['cities']) {

            $this->cities =
                new TimeLocationCities($params, $languageID);
        }

        if (isset($params['location']['capitals']) && $params['location']['capitals']) {

            $this->cities =
                new TimeLocationCities($params, $languageID);

        }

        if (isset($params['location']['citiesByPopulation']) && $params['location']['citiesByPopulation']) {
            $this->citiesByPopulation =
                new TimeLocationCities($params, $languageID);
        }

        if (isset($params['location']['countryID']) && $params['location']['countryID']) {

            $this->locationData =
                new TimeLocationData(['countryID' => $params['location']['countryID']], $languageID);

            $this->country =
                new TimeLocationCountry(
                    (new TimeLocationCountryTextUpdate($this->locationData))->data, $languageID);

            $this->cities =
                new TimeLocationCities($params, $languageID, $this->country);
        }

        if (isset($params['location']['countries']) && $params['location']['countries']) {

            $this->countries =
                new TimeLocationCountries($params, $languageID);
        }

        if (isset($params['location']['continentsArray']) && $params['location']['continentsArray']) {
            $this->continents =
                (new TimeLocationContinents($params, $languageID))->data;
        }


        if (isset($params['location']['continent']) && $params['location']['continent']) {
            $this->continent =
                (new TimeLocationContinent($params, $languageID));

            $this->countries =
                (new TimeLocationCountries($params, $languageID));

        }
    }
}
