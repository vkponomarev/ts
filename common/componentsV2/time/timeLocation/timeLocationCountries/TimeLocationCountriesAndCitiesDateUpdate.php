<?php

namespace common\componentsV2\time\timeLocation\timeLocationCountries;

class TimeLocationCountriesAndCitiesDateUpdate
{

    public $data;

    /**
     * TimeCityDate constructor.
     * @param $citiesData
     * @throws \Exception
     */
    public function __construct($countriesData)
    {
        $this->data = $countriesData->data;
        foreach ($this->data as $key => $country) {
            foreach ($country['cities'] as $key2 => $city) {
                $this->data[$key]['cities'][$key2]['date'] = (new \DateTime())->setTimezone(new \DateTimeZone($city['timezone']));
                $this->data[$key]['cities'][$key2]['offset'] = $this->data[$key]['cities'][$key2]['date']->format('P');
                $this->data[$key]['cities'][$key2]['offsetSimple'] = $this->data[$key]['cities'][$key2]['date']->format('O');
            }
        }
    }
}
