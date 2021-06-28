<?php

namespace common\componentsV2\namaz;


/**
 *
 * https://github.com/GeniusTS/prayer-times показывает совсем не то время которое должно быть
 * https://github.com/islamic-network/prayer-times работает
 * Class Namaz
 * @package common\componentsV2\namaz
 */
class Namaz
{

    public $geoIP;
    public $city;
    public $defaultCity;
    public $defaultCityPrevNext;
    public $geoIPCityPrevNext;
    public $cityPrevNext;
    public $month;
    public $year;

    /**
     * Time constructor.
     * @param $params ['time'] \common\componentsV2\time\Time
     * @param $params ['date'] \common\componentsV2\date\Date
     * @param $params ['languageID']
     * @throws \yii\db\Exception
     * @throws \Exception
     */
    function __construct($params)
    {
       // (new \common\components\dump\Dump())->printR($params['time']->location->city);


       // (new \common\components\dump\Dump())->printR($params['time']->geoIP->city);die;


        if (isset($params['time']->geoIP->active) && $params['time']->geoIP->active) {
            $this->geoIP = (new NamazGeoIpTimes($params['time']->geoIP, $params['languageID']));
            $this->geoIPCityPrevNext = (new NamazCitiesPrevNext($params['time']->geoIP->city));
        }

        if (isset($params['time']->location->city) && $params['time']->location->city) {
            $this->city = (new NamazCity($params['time']->location->city, $params['date'], $params['languageID']));
            $this->cityPrevNext = (new NamazCitiesPrevNext($params['time']->location->city));
        }


        if (isset($params['time']->location->defaultCity) && $params['time']->location->defaultCity) {
            $this->defaultCity = (new NamazCity($params['time']->location->defaultCity, $params['date'], $params['languageID']));
            $this->defaultCityPrevNext = (new NamazCitiesPrevNext($params['time']->location->defaultCity));
        }

        if (isset($params['month']) && $params['month'])
            $this->month = (new NamazCityMonth($params['time']->location->city, $params['date'], $params['languageID']));

        if (isset($params['year']) && $params['year'])
            $this->year = (new NamazCityYear($params['time']->location->city, $params['date'], $params['languageID']));


    }

}

