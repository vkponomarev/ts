<?php

namespace common\componentsV2\namaz;


use IslamicNetwork\PrayerTimes\PrayerTimes;

class NamazCityMonth
{
    public $times = array();

    /**
     * NamazGeoIp constructor.
     * @param $city \common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCity
     * @param $date \common\componentsV2\date\Date
     * @throws \Exception
     */
    function __construct($city, $date, $languageID)
    {

        $dateStart = new \DateTime(
            $date->year->current . '-' . $date->month->current . '-' . '01',
            new \DateTimezone($city->timezone));

        if ($city) {
            $pt = new PrayerTimes('ISNA');
            do {
                $this->times[$dateStart->format('d')] = $pt->getTimes(
                    $dateStart,
                    $city->latitude,
                    $city->longitude,
                    $elevation = null,
                    $latitudeAdjustmentMethod = $pt::LATITUDE_ADJUSTMENT_METHOD_ANGLE,
                    $midnightMode = $pt::MIDNIGHT_MODE_STANDARD,
                    $format = $pt::TIME_FORMAT_24H);
                $dateStart->modify('+1 day');
            } while ($dateStart->format('Y-m-d') <= $date->year->current . '-' . $date->month->current . '-' . $date->month->daysCount);

        } else {
            $this->times = 0;
        }

    }

}

