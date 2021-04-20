<?php

namespace common\componentsV2\time;


class Time
{

    public $citiesByPopulation;
    /**
     * @var \common\componentsV2\time\TimeTimeZones|int
     */
    public $timeZones;

    /**
     * @var \common\componentsV2\time\TimeTimeZone
     */
    public $timeZone;
    public $UTC;

    /**
     * Time constructor.
     * @param $params
     * @param $languageID
     */
    function __construct($params, $languageID)
    {
        $this->UTC = (new TimeUTC())->utc();

        if (isset($params['citiesByPopulation']) && $params['citiesByPopulation'])
            $this->citiesByPopulation = (new TimeUpdateDataTime())->update(
                (new TimeCitiesByPopulation())->data($languageID),
                $this->UTC);

        if (isset($params['timeZones']) && $params['timeZones'])
            $this->timeZones = (new TimeTimeZones($languageID));

        if (isset($params['timeZoneID']) && $params['timeZoneID'])
            $this->timeZone = (new TimeTimeZone($params['timeZoneID'], $languageID, $this->UTC));

        if (isset($params['timeZoneUpdateText']) && $params['timeZoneUpdateText'])
            (new TimeTimeZoneTextUpdate($this->timeZone));



    }

}

