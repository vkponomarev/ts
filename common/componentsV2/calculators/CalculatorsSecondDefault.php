<?php

namespace common\componentsV2\calculators;


use common\componentsV2\time\timeDifference\TimeDifference;
use common\componentsV2\time\timeGeoIP\TimeGeoIP;
use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeTimezone\TimeTimezone;

class CalculatorsSecondDefault
{


    public $calculator;

    /**
     * CalculatorsCurrent constructor.
     * @param $calculator \common\components\urlCheck\UrlCheckCalcName
     * @param $calculatorsNames \common\componentsV2\calculators\CalculatorsNames
     */
    function __construct($calculator, $calculatorsNames, $calculatorsCurrent)
    {
        $this->calculator = $calculatorsNames->calculators[$calculatorsCurrent->calculator->calculator['defaultOpponent']];
    }

}

