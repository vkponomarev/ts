<?php

namespace common\componentsV2\time\timeDifference;

use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesByPopulation;

class TimeDifferenceCities
{

    public $data;
    public $sorted;
    /**
     * TimeDifference constructor.
     * @param $location \common\componentsV2\time\timeLocation\TimeLocation
     * @param $geoIP \common\componentsV2\time\timeGeoIP\TimeGeoIP
     * @param $timezone \common\componentsV2\time\timeTimezone\TimeTimezone
     * @param $utc
     */
    public function __construct($cities)
    {
        $this->data = $cities->data;
        $this->sorted = $cities->sorted;
    }
}
