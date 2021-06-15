<?php

namespace common\componentsV2\time\timeDifference;

use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesByPopulation;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesDateUpdate;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesDifferenceSort;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesDifferenceUpdate;
use common\componentsV2\time\timeLocation\timeLocationCities\TimeLocationCitiesNameUpdate;
use common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCityDifferenceTextUpdate;

class TimeDifference
{

    public $location;
    public $prevNext;
    public $geoIP;
    public $timezone;
    public $cities;
    public $city;
    public $hours;
    public $hoursArray;

    /**
     * TimeDifference constructor.
     * @param $location \common\componentsV2\time\timeLocation\TimeLocation
     * @param $geoIP \common\componentsV2\time\timeGeoIP\TimeGeoIP
     * @param $timezone \common\componentsV2\time\timeTimezone\TimeTimezone
     * @param $utc
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($params, $location, $geoIP, $timezone, $utc, $languageID)
    {

        if (isset($params['difference']['cityID']) && $params['difference']['cityID']) {
            $this->location =
                (new TimeLocationCityDifferenceTextUpdate(
                    (new TimeLocation(['location' => $params['difference']], $languageID))))->data;

            $this->prevNext = new TimeDifferenceCitiesPrevNext($this->location);
        }

        $this->hours =
            new TimeDifferenceCalculation(
                new TimeDifferenceCalculationUTC(
                    new TimeDifferenceCalculationGeoIP(
                        new TimeDifferenceCalculationTimezone(
                            new TimeDifferenceCalculationLocation(
                                $this->location
                            ), $timezone)
                        , $geoIP)
                    , $utc)
                , $location);

        $this->cities =
            new TimeDifferenceCities(
                new TimeLocationCitiesDifferenceSort(
                    new TimeLocationCitiesDifferenceUpdate(
                        new TimeLocationCitiesDateUpdate(
                            new TimeLocationCitiesNameUpdate(
                                (new TimeLocationCitiesByPopulation($languageID, 100))))
                        , $location)));

        $this->hoursArray = new TimeDifferenceHoursArray();

    }
}
