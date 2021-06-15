<?php

namespace common\componentsV2\time\timeGeoIP;

use common\componentsV2\time\timeCity\TimeCityUpdateText;
use GeoIp2\Database\Reader;


class TimeGeoIPCountry
{


    public $nameOriginal;
    public $url;
    public $name;
    public $nameIn;
    public $nameFor;

    /**
     * TimeGeoIPCity constructor.
     * @param $geoNameData \common\componentsV2\time\timeGeoIP\TimeGeoIPGeoNameData
     * @throws \Exception
     */
    public function __construct($geoNameData)
    {
        $this->nameOriginal = $geoNameData->data['countryNameOriginal'];
        $this->url = $geoNameData->data['countryUrl'];
        $this->name = $geoNameData->data['countryName'];
        $this->nameIn = $geoNameData->data['countryNameIn'];
        $this->nameFor =$geoNameData->data['countryNameFor'];

        return $this;
    }

}

