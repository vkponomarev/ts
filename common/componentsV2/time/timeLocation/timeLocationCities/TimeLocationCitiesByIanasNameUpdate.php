<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

class TimeLocationCitiesByIanasNameUpdate
{

    public $data;
    /**
     * TimeCityDate constructor.
     * @param $citiesData
     * @throws \Exception
     */
    public function __construct($data)
    {

        $this->data = $data->data;

        if ($this->data->timezone->ianaData) {
            foreach ($this->data->timezone->ianaData as $key1 => $iana) {
                if (isset($iana['cities'])) {
                    foreach ($iana['cities'] as $key => $city) {
                        // Если русский язык то переводы достаем только для городов больше 745261
                        if (($data->languageID == 1) && ($city['population'] < 745261)) {


                            $this->data->timezone->ianaData[$key1]['cities'][$key]['name'] = $this->data->timezone->ianaData[$key1]['cities'][$key]['cityNameOriginal'];
                            $this->data->timezone->ianaData[$key1]['cities'][$key]['name_in'] = $this->data->timezone->ianaData[$key1]['cities'][$key]['cityNameOriginal'];
                            $this->data->timezone->ianaData[$key1]['cities'][$key]['name_for'] = $this->data->timezone->ianaData[$key1]['cities'][$key]['cityNameOriginal'];
                        }

                        if (($data->languageID <> 1)) {
                            $this->data->timezone->ianaData[$key1]['cities'][$key]['name'] = $this->data->timezone->ianaData[$key1]['cities'][$key]['cityNameOriginal'];
                            $this->data->timezone->ianaData[$key1]['cities'][$key]['name_in'] = $this->data->timezone->ianaData[$key1]['cities'][$key]['cityNameOriginal'];
                            $this->data->timezone->ianaData[$key1]['cities'][$key]['name_for'] = $this->data->timezone->ianaData[$key1]['cities'][$key]['cityNameOriginal'];
                        }
                    }

                }

            }
        } else {
            $this->data = 0;
        }


    }
}
