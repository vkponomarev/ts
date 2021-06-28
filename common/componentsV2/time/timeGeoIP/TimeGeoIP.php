<?php

namespace common\componentsV2\time\timeGeoIP;

class TimeGeoIP
{

    public $active;
    public $city;
    public $country;
    private $region;
    private $geoNameData;

    /**
     * TimeGeoIP constructor.
     * @param $geoIP string|int ip address|0
     * @param $languageID
     * @throws \yii\db\Exception
     * @throws \Exception
     */
    public function __construct($geoIP, $languageID)
    {

        $this->active =
            ($this->geoNameData =
                new TimeGeoIPGeoNameData(
                    new TimeGeoIPReader(
                        new TimeGeoIPSession(
                            new TimeGeoIPIPAddress($geoIP)
                        )), $languageID))->active;

        if ($this->geoNameData->active) {
            $this->city = new TimeGeoIPCity(
                $this->geoNameData
            );

            $this->country = new TimeGeoIPCountry(
                $this->geoNameData
            );
            $this->active = 1;

        }
    }
}
