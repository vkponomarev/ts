<?php

namespace common\componentsV2\time\timeLocation;


class TimeLocationData
{

    public $data;

    /**
     * TimeLocation constructor.
     * @param $params
     * @param $languageID
     * @throws \Exception
     */
    public function __construct($params, $languageID)
    {


        if (isset($params['cityID']) && $params['cityID']) {
            $this->data =
                (new TimeLocationDataCityByID($params['cityID'], $languageID))->data;

        }

        if (isset($params['countryID']) && $params['countryID']) {
            $this->data =
                (new TimeLocationDataCountryByID($params['countryID'], $languageID))->data;

        }

    }





}