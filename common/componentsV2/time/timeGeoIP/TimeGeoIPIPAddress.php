<?php

namespace common\componentsV2\time\timeGeoIP;

use GeoIp2\Database\Reader;


class TimeGeoIPIPAddress
{

    /**
     * @var string
     */
    public $ip;

    public function __construct($geoIP)
    {

        if ($geoIP && $geoIP == 1)
            $geoIP = \Yii::$app->request->getUserIP();

        $this->ip = $geoIP;
    }
}

