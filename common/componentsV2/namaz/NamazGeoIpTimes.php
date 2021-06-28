<?php

namespace common\componentsV2\namaz;


use common\componentsV2\time\timeDifference\TimeDifference;
use common\componentsV2\time\timeGeoIP\TimeGeoIP;
use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeTimezone\TimeTimezone;
use GeniusTS\PrayerTimes\Coordinates;
use GeniusTS\PrayerTimes\Prayer;
use IslamicNetwork\PrayerTimes\PrayerTimes;

class NamazGeoIpTimes
{
    public $times;

    /**
     * NamazGeoIp constructor.
     * @param $geoIP \common\componentsV2\time\timeGeoIP\TimeGeoIP
     * @param $languageID
     * @throws \Exception
     */
    function __construct($geoIP, $languageID)
    {

        if ($geoIP->active){
            $pt = new PrayerTimes('ISNA');

            $this->times = $pt->getTimesForToday(
                $geoIP->city->latitude,
                $geoIP->city->longitude,
                $geoIP->city->timezone,
                $elevation = null,
                $latitudeAdjustmentMethod = $pt::LATITUDE_ADJUSTMENT_METHOD_ANGLE,
                $midnightMode = $pt::MIDNIGHT_MODE_STANDARD,
                $format = $pt::TIME_FORMAT_24H);
        } else {

            $this->times = 0;

        }



    }

}

