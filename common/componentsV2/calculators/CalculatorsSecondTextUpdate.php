<?php

namespace common\componentsV2\calculators;


use common\componentsV2\time\timeDifference\TimeDifference;
use common\componentsV2\time\timeGeoIP\TimeGeoIP;
use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeTimezone\TimeTimezone;

class CalculatorsSecondTextUpdate
{

    public $calculator;
    public $calculatorsNames;
    private $timeOne;
    private $timeTwo;

    /**
     * CalculatorsNamesTextUpdate constructor.
     * @param $calculator \common\componentsV2\calculators\CalculatorsSecond
     */
    function __construct($calculator)
    {

        $this->calculator = $calculator;

        \Yii::$app->params['text']['title'] = str_replace('{calcName}', $this->calculator->calculator['nameText'], \Yii::$app->params['text']['title']);

        \Yii::$app->params['text']['h1'] = str_replace('{calcName}', $this->calculator->calculator['nameText'], \Yii::$app->params['text']['h1']);

        \Yii::$app->params['text']['description'] = str_replace('{calcName}', $this->calculator->calculator['nameText'], \Yii::$app->params['text']['description']);

        \Yii::$app->params['text']['text1'] = str_replace('{calcName}', $this->calculator->calculator['nameText'], \Yii::$app->params['text']['text1']);



        if ($calculator->current){

            \Yii::$app->params['text']['title'] = str_replace('{timeToTime}', $this->calculator->current->calculator->calculator['links'][$this->calculator->calculator['id']]['text'], \Yii::$app->params['text']['title']);

            \Yii::$app->params['text']['h1'] = str_replace('{timeToTime}', $this->calculator->current->calculator->calculator['links'][$this->calculator->calculator['id']]['text'], \Yii::$app->params['text']['h1']);

            \Yii::$app->params['text']['description'] = str_replace('{timeToTime}', $this->calculator->current->calculator->calculator['links'][$this->calculator->calculator['id']]['text'], \Yii::$app->params['text']['description']);

            \Yii::$app->params['text']['text1'] = str_replace('{timeToTime}', $this->calculator->current->calculator->calculator['links'][$this->calculator->calculator['id']]['text'], \Yii::$app->params['text']['text1']);

        }




    }

}

