<?php

namespace common\componentsV2\calculators;


use common\componentsV2\time\timeDifference\TimeDifference;
use common\componentsV2\time\timeGeoIP\TimeGeoIP;
use common\componentsV2\time\timeLocation\TimeLocation;
use common\componentsV2\time\timeTimezone\TimeTimezone;

class CalculatorsConversionNumbersTextUpdate
{

    public $calculator;
    public $calculatorsNames;
    private $timeOne;
    private $timeTwo;

    /**
     * CalculatorsNamesTextUpdate constructor.
     * @param $calculator \common\componentsV2\calculators\CalculatorsSecond
     */
    function __construct($params, $calculatorOne, $calculatorTwo)
    {

        if ($calculatorOne->calculator->calculator['id'] == 1){
            $someTime = \Yii::t('app', '{n,plural, one{# second} few{# seconds} other{# seconds}}', [
                'n' => $params['someTime'],
            ]);
        }
        if ($calculatorOne->calculator->calculator['id'] == 2){
            $someTime = \Yii::t('app', '{n,plural, one{# minute} few{# minutes} other{# minutes}}', [
                'n' => $params['someTime'],
            ]);
        }
        if ($calculatorOne->calculator->calculator['id'] == 3){
            $someTime = \Yii::t('app', '{n,plural, one{# hour} few{# hours} other{# hours}}', [
                'n' => $params['someTime'],
            ]);
        }
        if ($calculatorOne->calculator->calculator['id'] == 4){
            $someTime = \Yii::t('app', '{n,plural, one{# day} few{# days} other{# days}}', [
                'n' => $params['someTime'],
            ]);
        }
        if ($calculatorOne->calculator->calculator['id'] == 5){
            $someTime = \Yii::t('app', '{n,plural, one{# week} few{# weeks} other{# weeks}}', [
                'n' => $params['someTime'],
            ]);
        }
        if ($calculatorOne->calculator->calculator['id'] == 6){
            $someTime = \Yii::t('app', '{n,plural, one{# month} few{# months} other{# months}}', [
                'n' => $params['someTime'],
            ]);
        }
        if ($calculatorOne->calculator->calculator['id'] == 7){
            $someTime = \Yii::t('app', '{n,plural, one{# year} few{# years} other{# years}}', [
                'n' => $params['someTime'],
            ]);
        }

        if ($calculatorTwo->calculator->calculator['id'] == 1){
            $toTime = \Yii::t('appDiff', 'to seconds');

        }
        if ($calculatorTwo->calculator->calculator['id'] == 2){
            $toTime = \Yii::t('appDiff', 'to minutes');
        }
        if ($calculatorTwo->calculator->calculator['id'] == 3){
            $toTime = \Yii::t('appDiff', 'to hours');
        }
        if ($calculatorTwo->calculator->calculator['id'] == 4){
            $toTime = \Yii::t('appDiff', 'to days');
        }
        if ($calculatorTwo->calculator->calculator['id'] == 5){
            $toTime = \Yii::t('appDiff', 'to weeks');
        }
        if ($calculatorTwo->calculator->calculator['id'] == 6){
            $toTime = \Yii::t('appDiff', 'to months');
        }
        if ($calculatorTwo->calculator->calculator['id'] == 7){
            $toTime = \Yii::t('appDiff', 'to years');
        }

        //$this->calculator = $calculator;

        \Yii::$app->params['text']['title'] = str_replace('{someTime}', $someTime, \Yii::$app->params['text']['title']);
        \Yii::$app->params['text']['title'] = str_replace('{toTime}', $toTime, \Yii::$app->params['text']['title']);

        \Yii::$app->params['text']['h1'] = str_replace('{someTime}', $someTime, \Yii::$app->params['text']['h1']);
        \Yii::$app->params['text']['h1'] = str_replace('{toTime}', $toTime, \Yii::$app->params['text']['h1']);

        \Yii::$app->params['text']['description'] = str_replace('{someTime}', $someTime, \Yii::$app->params['text']['description']);
        \Yii::$app->params['text']['description'] = str_replace('{toTime}', $toTime, \Yii::$app->params['text']['description']);

        \Yii::$app->params['text']['text1'] = str_replace('{someTime}', $someTime, \Yii::$app->params['text']['text1']);
        \Yii::$app->params['text']['text1'] = str_replace('{toTime}', $toTime, \Yii::$app->params['text']['text1']);

    }

}

