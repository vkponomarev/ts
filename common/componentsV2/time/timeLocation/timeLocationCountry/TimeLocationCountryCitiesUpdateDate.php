<?php

namespace common\componentsV2\time\timeLocation\timeLocationCountry;


class TimeLocationCountryCitiesUpdateDate
{

    public $data;

    /**
     * TimeLocationCountryCitiesUpdateDate constructor.
     * @param $citiesData \common\componentsV2\time\timeLocation\timeLocationCountry\TimeLocationCountryCitiesByPopulation
     * @throws \Exception
     */
    public function __construct($citiesData)
    {



        $this->data = $citiesData->data;

        foreach ($this->data as $key => $item) {
            $this->data[$key]['date'] = (new \DateTime())->setTimezone(new \DateTimeZone($item['timezone']));
            $this->data[$key]['offset'] = $this->data[$key]['date']->format('P');
            $this->data[$key]['offsetSimple'] = $this->data[$key]['date']->format('O');

        }

    }
}
