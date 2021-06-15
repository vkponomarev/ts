<?php

namespace common\componentsV2\time\timeGeoIP;

use GeoIp2\Database\Reader;


class TimeGeoIPSession
{

    public $name;
    public $session;

    /**
     * @var \common\componentsV2\time\timeGeoIP\TimeGeoIPIPAddress
     */
    public $ip;


    /**
     * TimeGeoIPSession constructor.
     * @param $IPAddress \common\componentsV2\time\timeGeoIP\TimeGeoIPIPAddress
     */
    public function __construct($IPAddress)
    {

        $this->ip = $IPAddress->ip;
        $this->name = 'GeoIP:' . $this->ip;
        $this->session = \Yii::$app->session;
    }
}

