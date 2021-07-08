<?php

namespace common\componentsV2\calculators;


class Calculators
{

    public $dateOne;
    public $dateTwo;
    public $dateDiff;

    /**
     * @var \common\componentsV2\calculators\CalculatorsTimeCalculation
     */
    public $time;

    /**
     * @var \common\componentsV2\calculators\CalculatorsDateCalculation
     */
    public $date;

    /**
     * @var \common\componentsV2\calculators\CalculatorsDateCalculation
     */
    public $names;

    /**
     * @var \common\componentsV2\calculators\CalculatorsDateCalculation
     */
    public $current;

    function __construct($params)
    {
        $this->time = new CalculatorsTimeCalculation();
        $this->date = new CalculatorsDateCalculation();
        $this->names = new CalculatorsNames();

        if ((isset($params['calcName']) && $params['calcName']) && (!isset($params['calcNameSecond']))) {
            $this->current =
                new CalculatorsCurrentTextUpdate(
                    new CalculatorsCurrent(
                        $params, $this->names)
                );

            $this->second =
                new CalculatorsCurrentTextUpdate(
                    new CalculatorsSecondDefault(
                        $params, $this->names, $this->current)
                );

            $this->conversion =
                new CalculatorsConversion($params, $this->current, $this->second, $this->names);

            $this->toHowManyLinks =
                $this->names->calculators[$this->current->calculator->calculator['id']]['links'];

        }

        if ((isset($params['calcName']) && $params['calcName']) && (isset($params['calcNameSecond']) && $params['calcNameSecond'])) {
            $this->current =
                new CalculatorsCurrentTextUpdate(
                    new CalculatorsCurrent(
                        $params, $this->names)
                );

            $this->second =
                new CalculatorsSecondTextUpdate(
                    new CalculatorsSecond(
                        $params, $this->names, $this->current)
                );

            if (isset($params['howMany']) && $params['howMany']){
                $currentTmp = $this->current;
                $this->current = $this->second;
                $this->second = $currentTmp;

                new CalculatorsHowManyTextUpdate($params, $this->current, $this->second);

                $this->toHowManyLinks =
                    $this->names->calculators[$this->second->calculator->calculator['id']]['links'];

            } else {
                $this->toHowManyLinks =
                    $this->names->calculators[$this->current->calculator->calculator['id']]['links'];
            }

            $this->toTimeLinks =
                (new CalculatorsConversionNumbersArray())->array[$this->current->calculator->calculator['id']][$this->second->calculator->calculator['id']];




            if (isset($params['someTime']) && $params['someTime']){

                $this->conversion =
                    new CalculatorsConversion($params, $this->current, $this->second, $this->names, $params['someTime']);

                new CalculatorsConversionNumbersTextUpdate($params, $this->current, $this->second);

            } else {

                $this->conversion =
                    new CalculatorsConversion($params, $this->current, $this->second, $this->names);

            }



        }
    }
}

