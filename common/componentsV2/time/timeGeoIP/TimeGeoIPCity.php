<?php

namespace common\componentsV2\time\timeGeoIP;

use common\componentsV2\time\timeCity\TimeCityUpdateText;


class TimeGeoIPCity
{

    public $id;
    public $timezone;
    public $date;
    public $offset;
    public $offsetSimple;
    public $nameOriginal;
    public $url;
    public $name;
    public $nameIn;
    public $nameFor;
    public $latitude;
    public $longitude;

    /**
     * TimeGeoIPCity constructor.
     * @param $geoNameData \common\componentsV2\time\timeGeoIP\TimeGeoIPGeoNameData
     * @throws \Exception
     */
    public function __construct($geoNameData)
    {
        $this->id = $geoNameData->data['id'];
        $this->timezone = $geoNameData->data['timezone'];
        $this->date = (new \DateTime())->setTimezone(new \DateTimeZone($this->timezone));
        $this->offset = $this->date->format('P');
        $this->offsetSimple = $this->date->format('O');

        $this->nameOriginal = $geoNameData->data['cityNameOriginal'];
        $this->url = $geoNameData->data['cityUrl'];
        $this->name = $geoNameData->data['cityName'];
        $this->nameIn = $geoNameData->data['cityNameIn'];
        $this->nameFor = $geoNameData->data['cityNameFor'];

        $this->latitude = $geoNameData->data['latitude'];
        $this->longitude = $geoNameData->data['longitude'];


        return $this;
    }

}

