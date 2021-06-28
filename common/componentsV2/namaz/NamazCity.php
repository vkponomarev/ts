<?php

namespace common\componentsV2\namaz;


use common\componentsV2\time\timeDifference\TimeDifference;
use common\componentsV2\time\timeGeoIP\TimeGeoIP;
use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeTimezone\TimeTimezone;
use GeniusTS\PrayerTimes\Coordinates;
use GeniusTS\PrayerTimes\Prayer;
use IslamicNetwork\PrayerTimes\PrayerTimes;

class NamazCity
{
    public $times;

    /**
     * NamazGeoIp constructor.
     * @param $city \common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCity
     * @param $languageID
     * @throws \Exception
     */
    function __construct($city, $date, $languageID)
    {

        if ($city){
            $pt = new PrayerTimes('ISNA');

            $this->times = $pt->getTimesForToday(
                $city->latitude,
                $city->longitude,
                $city->timezone,
                $elevation = null,
                $latitudeAdjustmentMethod = $pt::LATITUDE_ADJUSTMENT_METHOD_ANGLE,
                $midnightMode = $pt::MIDNIGHT_MODE_STANDARD,
                $format = $pt::TIME_FORMAT_24H);
        } else {
            $this->times = 0;
        }

        (new NamazCityTextUpdate($date));

    }

}

