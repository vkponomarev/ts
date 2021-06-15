<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

class TimeLocationCitiesDifferenceUpdate
{

    public $data;

    /**
     * TimeCityDate constructor.
     * @param $citiesData
     * @param $location \common\componentsV2\time\timeLocation\TimeLocation
     * @throws \Exception
     */
    public function __construct($citiesData, $location)
    {
        $this->data = $citiesData->data;



        $offsetOne = $location->city->date->getOffset() / 3600;
        if ($this->data) {
            foreach ($this->data as $key => $city) {
                $offsetTwo = $city['date']->getOffset() / 3600;
                $this->data[$key]['differenceHours'] = $offsetTwo - $offsetOne;
                //(new \common\components\dump\Dump())->printR($offsetOne);
                //(new \common\components\dump\Dump())->printR($offsetTwo);die;


            }
        } else {
            $this->data = 0;
        }

    }
}
