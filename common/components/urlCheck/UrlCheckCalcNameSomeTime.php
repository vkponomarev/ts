<?php

namespace common\components\urlCheck;


use common\componentsV2\calculators\CalculatorsConversionNumbersArray;
use yii\web\NotFoundHttpException;


class UrlCheckCalcNameSomeTime
{


    function __construct($calcNameOne, $calcNameTwo, $number)
    {


        $this->calculators = [
            1 => 'seconds',
            2 => 'minutes',
            3 => 'hours',
            4 => 'days',
            5 => 'weeks',
            6 => 'months',
            7 => 'years',
        ];

        $this->calculatorTimes = new CalculatorsConversionNumbersArray();

        $this->range = $this->calculatorTimes->array[$calcNameOne->calculator][$calcNameTwo->calculator];

        $search = array_search($number, $this->range);

        if (!($search !== false)){
            throw new NotFoundHttpException('404');
        }

        unset ($this->calculatorTimes);
        unset ($this->calculators);

    }


}
