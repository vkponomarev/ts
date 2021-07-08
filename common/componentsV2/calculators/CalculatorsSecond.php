<?php

namespace common\componentsV2\calculators;


use common\componentsV2\time\timeDifference\TimeDifference;
use common\componentsV2\time\timeGeoIP\TimeGeoIP;
use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeTimezone\TimeTimezone;

class CalculatorsSecond
{


    public $calculator;


    function __construct($params, $calculatorsNames, $calculatorsCurrent)
    {
        $this->current = $calculatorsCurrent;

        $this->calculator = $calculatorsNames->calculators[$params['calcNameSecond']->calculator];

    }

}

