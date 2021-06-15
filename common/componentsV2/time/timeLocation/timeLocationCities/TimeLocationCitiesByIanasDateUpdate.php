<?php

namespace common\componentsV2\time\timeLocation\timeLocationCities;

class TimeLocationCitiesByIanasDateUpdate
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
        if ($this->data) {

            foreach ($this->data->timezone->ianaData as $key1 => $iana) {

                if (isset($iana['cities'])) {
                    foreach ($iana['cities'] as $key => $city) {
                        $this->data->timezone->ianaData[$key1]['cities'][$key]['date'] = (new \DateTime())->setTimezone(new \DateTimeZone($city['timezone']));
                        $this->data->timezone->ianaData[$key1]['cities'][$key]['offset'] = $this->data->timezone->ianaData[$key1]['cities'][$key]['date']->format('P');
                        $this->data->timezone->ianaData[$key1]['cities'][$key]['offsetSimple'] = $this->data->timezone->ianaData[$key1]['cities'][$key]['date']->format('O');
                    }
                }
            }

        } else {
            $this->data = 0;
        }
    }
}
