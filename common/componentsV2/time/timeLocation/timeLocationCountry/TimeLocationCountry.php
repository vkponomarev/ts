<?php

namespace common\componentsV2\time\timeLocation\timeLocationCountry;


class TimeLocationCountry
{

    public $name;
    public $nameOriginal;
    public $nameIn;
    public $nameFor;
    //public $timezone;
    //public $date;
    //public $offset;
    //public $offsetSimple;
    public $url;
    public $countryCode;
    private $countryData;

    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($locationData, $languageID)
    {

        $this->countryCode = $locationData->data['countryCode'];
        $this->name = $locationData->data['countryName'];
        $this->nameOriginal = $locationData->data['countryNameOriginal'];
        $this->nameIn = $locationData->data['countryNameIn'];
        $this->nameFor = $locationData->data['countryNameFor'];
        $this->url = $locationData->data['countryUrl'];






    }
}
