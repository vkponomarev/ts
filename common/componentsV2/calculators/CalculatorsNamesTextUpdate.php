<?php

namespace common\componentsV2\calculators;


use common\componentsV2\time\timeDifference\TimeDifference;
use common\componentsV2\time\timeGeoIP\TimeGeoIP;
use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeTimezone\TimeTimezone;

class CalculatorsNamesTextUpdate
{

    public $calculators;
    public $calculatorsNames;
    private $timeOne;
    private $timeTwo;

    /**
     * CalculatorsNamesTextUpdate constructor.
     * @param $calculators \common\componentsV2\calculators\CalculatorsNames
     */
    function __construct($calculators)
    {
        $this->calculators = $calculators;

        \Yii::$app->params['text']['title'] = str_replace('{calcName}', $this->calculators->calculators['nameText'], \Yii::$app->params['text']['title']);

        \Yii::$app->params['text']['h1'] = str_replace('{calcName}', $this->calculators->calculators['nameText'], \Yii::$app->params['text']['h1']);

        \Yii::$app->params['text']['description'] = str_replace('{calcName}', $this->calculators->calculators['nameText'], \Yii::$app->params['text']['description']);

        \Yii::$app->params['text']['text1'] = str_replace('{calcName}', $this->calculators->calculators['nameText'], \Yii::$app->params['text']['text1']);

    }

}

