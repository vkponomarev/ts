<?php

namespace common\componentsV2\time\timeDifference;

class TimeDifferenceCalculationGeoIP
{

    public $date;
    public $name;

    public function __construct($data, $geoIP)
    {
        $this->date = ($data->date) ? $data->date :
            ((isset($geoIP->city->date)) ? $geoIP->city->date : 0);

        $this->name = ($data->name) ? $data->name :
            ((isset($geoIP->city->date)) ? 'geoIP' : 0);

    }
}
