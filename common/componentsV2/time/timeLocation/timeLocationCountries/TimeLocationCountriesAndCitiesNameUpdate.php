<?php

namespace common\componentsV2\time\timeLocation\timeLocationCountries;

class TimeLocationCountriesAndCitiesNameUpdate
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

            foreach ($country['cities'] as $key1 => $city) {


                // Если русский язык то переводы достаем только для городов больше 745261
                if (($countriesData->languageID == 1) && ($this->data[$key]['cities'][$key1]['population'] < 745261)) {
                    $this->data[$key]['cities'][$key1]['name'] =  $this->data[$key]['cities'][$key1]['cityNameOriginal'];
                    $this->data[$key]['cities'][$key1]['name_in'] =  $this->data[$key]['cities'][$key1]['cityNameOriginal'];
                    $this->data[$key]['cities'][$key1]['name_for'] =  $this->data[$key]['cities'][$key1]['cityNameOriginal'];
                }

                if (($countriesData->languageID <> 1)) {
                    $this->data[$key]['cities'][$key1]['name'] =  $this->data[$key]['cities'][$key1]['cityNameOriginal'];
                    $this->data[$key]['cities'][$key1]['name_in'] =  $this->data[$key]['cities'][$key1]['cityNameOriginal'];
                    $this->data[$key]['cities'][$key1]['name_for'] =  $this->data[$key]['cities'][$key1]['cityNameOriginal'];
                }

            }
        }



    }
}
