<?php

namespace common\componentsV2\time\timeLocation\timeLocationCountry;

use common\componentsV2\time\TimeUpdateTime;
use Yii;
class TimeLocationCountryTextUpdate
{

    public $data;
    /**
     * TimeCityUpdateText constructor.
     */
    public function __construct($locationData)
    {
        $this->data = $locationData;

        /**
         * {timeCityName} ({timeCityNameOriginal} {timeUTC}  {timeCityNameIn}
         */
        Yii::$app->params['text']['title'] = str_replace('{timeCountryNameIn}', $locationData->data['countryNameIn'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{timeCountryNameOriginal}', $locationData->data['countryNameOriginal'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{timeCountryNameIn}', $locationData->data['countryNameIn'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{timeCountryNameIn}', $locationData->data['countryNameIn'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{timeCountryName}', $locationData->data['countryName'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{timeCountryNameOriginal}', $locationData->data['countryNameOriginal'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{timeCountryNameIn}', $locationData->data['countryNameIn'], Yii::$app->params['text']['text1']);

    }
}
