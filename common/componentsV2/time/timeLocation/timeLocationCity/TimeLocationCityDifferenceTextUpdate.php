<?php

namespace common\componentsV2\time\timeLocation\timeLocationCity;

use common\componentsV2\time\TimeUpdateTime;
use Yii;
class TimeLocationCityDifferenceTextUpdate
{

    public $data;

    /**
     * TimeLocationCityDifferenceTextUpdate constructor.
     * @param $location
     */
    public function __construct($location)
    {
        $this->data = $location;

        /**
         * {timeCityName} ({timeCityNameOriginal} {timeUTC}  {timeCityNameIn}
         */
        Yii::$app->params['text']['title'] = str_replace('{timeCityNameSecond}', $this->data->city->name, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{timeCityNameSecond}',$this->data->city->name, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{timeCityNameSecond}', $this->data->city->name, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{timeCountryNameSecond}', $this->data->country->name, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{timeCityNameSecond}', $this->data->city->name, Yii::$app->params['text']['text1']);

    }
}
