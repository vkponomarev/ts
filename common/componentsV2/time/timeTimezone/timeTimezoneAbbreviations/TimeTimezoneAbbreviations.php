<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneAbbreviations;


use common\componentsV2\time\TimeCitiesByPopulation;
use common\componentsV2\time\TimeUpdateDataTime;
use common\componentsV2\time\TimeUpdateTime;

class TimeTimezoneAbbreviations
{


    public $data;

    /**
     * TimeTimezoneAbbreviations constructor.
     * @param $params
     * @param $languageID
     */
    public function __construct($params, $languageID)
    {

        if (isset($params['timezone']['abbreviations']) && $params['timezone']['abbreviations']) {
            $this->data =
                (new TimeTimezoneAbbreviationsData($languageID)
                )->data;
        }

    }
}
