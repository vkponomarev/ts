<?php

namespace common\componentsV2\calculators;


class CalculatorsConversionSecond
{

    function __construct($params, $current, $second, $names)
    {

        if (\Yii::$app->request->get('second-value'))
            $this->value = \Yii::$app->request->get('second-value');
        else
            $this->value = 1;

        if (\Yii::$app->request->get('second-value-name'))
            $this->name = \Yii::$app->request->get('second-value-name');
        else {
            if (isset($second->calculator)){
                $this->name = $second->calculator->calculator['url'];
            } else {
                $this->name = $names->calculators[$current->calculator->calculator['defaultOpponent']]['url'];
            }

        }

    }

}

