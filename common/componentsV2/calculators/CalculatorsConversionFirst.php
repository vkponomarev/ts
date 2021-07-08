<?php

namespace common\componentsV2\calculators;


class CalculatorsConversionFirst
{

    function __construct($params, $current, $someTime = 0)
    {

        if (\Yii::$app->request->get('first-value'))
            $this->value = \Yii::$app->request->get('first-value');
        else
            if ($someTime)
                $this->value = $someTime;
            else
                $this->value = 1;

        if (\Yii::$app->request->get('first-value-name'))
            $this->name = \Yii::$app->request->get('first-value-name');
        else
            $this->name = $current->calculator->calculator['url'];




    }

}

