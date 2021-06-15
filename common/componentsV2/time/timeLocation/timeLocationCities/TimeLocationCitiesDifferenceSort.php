<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

use yii\helpers\StringHelper;

class TimeLocationCitiesDifferenceSort
{

    public $data;
    public $sorted;

    /**
     * TimeCityDate constructor.
     * @param $citiesData
     * @param $location \common\componentsV2\time\timeLocation\TimeLocation
     * @throws \Exception
     */
    public function __construct($citiesData)
    {

        $this->data = $citiesData->data;
        $this->sorted = [];

        foreach ($this->data as $key => $city) {

            if ($city['differenceHours'] > 0)
                $sortKey = $city['differenceHours'] * 2;
            if ($city['differenceHours'] == 0)
                $sortKey = $city['differenceHours'];
            if ($city['differenceHours'] < 0)
                $sortKey = $city['differenceHours'];

            $this->sorted[(string)$sortKey][] = $city;
        }

    }
}
