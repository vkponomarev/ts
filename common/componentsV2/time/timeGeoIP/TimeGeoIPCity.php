<?php

namespace common\componentsV2\time\timeGeoIP;

use common\componentsV2\time\timeCity\TimeCityUpdateText;
use GeoIp2\Database\Reader;


class TimeGeoIPCity
{

    public $timezone;
    public $date;
    public $offset;
    public $offsetSimple;
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
        $this->timezone = $geoNameData->data['timezone'];
        $this->date = (new \DateTime())->setTimezone(new \DateTimeZone($this->timezone));
        $this->offset = $this->date->format('P');
        $this->offsetSimple = $this->date->format('O');

        $this->nameOriginal = $geoNameData->data['cityNameOriginal'];
        $this->url = $geoNameData->data['cityUrl'];
        $this->name = $geoNameData->data['cityName'];
        $this->nameIn = $geoNameData->data['cityNameIn'];
        $this->nameFor =$geoNameData->data['cityNameFor'];



        return $this;
    }

}

