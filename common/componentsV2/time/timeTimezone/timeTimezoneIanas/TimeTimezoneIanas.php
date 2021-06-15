<?php

namespace common\componentsV2\time\timeTimezone\timeTimezoneIanas;


use common\componentsV2\time\TimeCitiesByPopulation;
use common\componentsV2\time\TimeUpdateDataTime;
use common\componentsV2\time\TimeUpdateTime;

class TimeTimezoneIanas
{

    public $data;

    /**
     * TimeTimezoneAbbreviations constructor.
     * @param $params
     * @param $languageID
     */
    public function __construct($params)
    {

        if (isset($params['timezone']['ianas']) && $params['timezone']['ianas']) {
            $this->data =
                (new TimeTimezoneIanasData()
                )->data;
        }

    }
}
