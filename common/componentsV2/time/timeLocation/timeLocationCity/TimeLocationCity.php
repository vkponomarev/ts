<?php

namespace common\componentsV2\time\timeLocation\timeLocationCity;


class TimeLocationCity
{
    public $id;
    public $name;
    public $nameOriginal;
    public $nameIn;
    public $nameFor;
    public $timezone;
    public $date;
    public $dateReal;
    public $offset;
    public $offsetSimple;
    public $url;
    public $country;
    public $countryCode;
    private $city;

    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($cityData, $languageID)
    {

        $this->city =
            (new TimeLocationCityUpdateText(
                new TimeLocationCityDate($cityData)
            ));

        $this->id = $this->city->data->cityData['id'];
        $this->name = $this->city->data->cityData['cityName'];
        $this->nameOriginal = $this->city->data->cityData['cityNameOriginal'];
        $this->nameIn = $this->city->data->cityData['cityNameIn'];
        $this->nameFor = $this->city->data->cityData['cityNameFor'];
        $this->timezone = $this->city->data->cityData['timezone'];
        $this->url = $this->city->data->cityData['url'];
        $this->countryCode = $this->city->data->cityData['countryCode'];
        $this->offset = $this->city->data->offset;
        $this->offsetSimple = $this->city->data->offsetSimple;
        $this->date = $this->city->data->date;
        $this->dateReal = new \DateTime($this->city->data->date->format('Y-m-d H:i:s'));



    }
}
