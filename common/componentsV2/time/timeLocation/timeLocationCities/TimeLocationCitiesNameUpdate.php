<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

class TimeLocationCitiesNameUpdate
{

    public $data;
    public $languageID;

    /**
     * TimeCityDate constructor.
     * @param $citiesData
     * @throws \Exception
     */
    public function __construct($citiesData)
    {
        $this->data = $citiesData->data;
        $this->languageID = $citiesData->languageID;

        if ($this->data) {
            foreach ($this->data as $key => $city) {

                // Если русский язык то переводы достаем только для городов больше 745261
                if (($this->languageID == 1) && ($this->data[$key]['population'] < 745261)) {
                    $this->data[$key]['name'] = $this->data[$key]['cityNameOriginal'];
                    $this->data[$key]['name_in'] = $this->data[$key]['cityNameOriginal'];
                    $this->data[$key]['name_for'] = $this->data[$key]['cityNameOriginal'];
                }

                if (($this->languageID <> 1)) {
                    $this->data[$key]['name'] = $this->data[$key]['cityNameOriginal'];
                    $this->data[$key]['name_in'] = $this->data[$key]['cityNameOriginal'];
                    $this->data[$key]['name_for'] = $this->data[$key]['cityNameOriginal'];
                }
            }
        } else {
            $this->data = 0;
        }
    }
}
