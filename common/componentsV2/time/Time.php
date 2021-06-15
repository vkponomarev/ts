<?php

namespace common\componentsV2\time;


use common\componentsV2\time\timeDifference\TimeDifference;
use common\componentsV2\time\timeGeoIP\TimeGeoIP;
use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeTimezone\TimeTimezone;

class Time
{

    public $geoIP;

    public $cities;

    public $location;

    public $city;

    public $citiesByPopulation;
    /**
     * @var \common\componentsV2\time\TimeTimeZones|int
     */
    public $timeZones;

    /**
     * @var \common\componentsV2\time\TimeTimeZone
     */
    public $timeZone;

    /**
     * @var \common\componentsV2\time\timeTimezone\TimeTimezone
     */
    public $timezone;

    public $timeZoneTime;

    public $UTC;

    /**
     * Time constructor.
     * @param $params
     * @param $languageID
     * @throws \yii\db\Exception
     * @throws \Exception
     */
    function __construct($params, $languageID)
    {
        $this->UTC = (new TimeUTC())->utc();

        if (isset($params['location']) && $params['location'])
            $this->location = (new TimeLocation(['location' => $params['location']], $languageID));

        if (isset($params['geoIP']) && $params['geoIP'])
            $this->geoIP = (new TimeGeoIP($params['geoIP'], $languageID));

        if (isset($params['timezone']) && $params['timezone']) {

            $this->timezone = (new TimeTimezone($params, $languageID));

        }

        if (isset($params['difference']) && $params['difference']) {

            $this->difference = (new TimeDifference(
                $params,
                $this->location,
                $this->geoIP,
                $this->timezone,
                $this->UTC,
                $languageID
            ));

        }

    }

}

