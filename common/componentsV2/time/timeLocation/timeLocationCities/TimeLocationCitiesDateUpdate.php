<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

class TimeLocationCitiesDateUpdate
{

    public $data;

    /**
     * TimeCityDate constructor.
     * @param $citiesData
     * @throws \Exception
     */
    public function __construct($citiesData)
    {
        $this->data = $citiesData->data;

        if ($this->data) {
            foreach ($this->data as $key => $city) {
                $this->data[$key]['date'] = (new \DateTime())->setTimezone(new \DateTimeZone($city['timezone']));
                $this->data[$key]['offset'] = $this->data[$key]['date']->format('P');
                $this->data[$key]['offsetSimple'] = $this->data[$key]['date']->format('O');
            }
        } else {
            $this->data = 0;
        }
    }
}
