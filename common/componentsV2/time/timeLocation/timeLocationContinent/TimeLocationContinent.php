<?php

namespace common\componentsV2\time\timeLocation\timeLocationContinent;


class TimeLocationContinent
{

    public $name;
    public $nameOriginal;
    public $nameIn;
    public $nameFor;
    public $url;
    public $code;
    private $data;

    /**
     * TimeCity constructor.
     * @param $city
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($params, $languageID)
    {

        if (isset($params['location']['continent']) && $params['location']['continent']) {
            $this->data =
                (new TimeLocationContinentTextUpdate(
                    new TimeLocationContinentByID($params['location']['continent'], $languageID)
                ))->data;
        }


        $this->code = $this->data['code'];
        $this->name = $this->data['name'];
        $this->nameOriginal = $this->data['nameOriginal'];
        $this->nameIn = $this->data['nameIn'];
        $this->nameFor = $this->data['nameFor'];
        $this->url = $this->data['url'];



    }
}
