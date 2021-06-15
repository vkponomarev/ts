<?php

namespace common\componentsV2\time\timeLocation\timeLocationCity;

use common\componentsV2\time\TimeUpdateTime;
use Yii;
class TimeLocationCityUpdateText
{

    public $data;
    /**
     * TimeCityUpdateText constructor.
     * @param $geoNameData \common\componentsV2\time\timeLocation\timeLocationCity\TimeLocationCityDate
     */
    public function __construct($geoNameData)
    {
        $this->data = $geoNameData;

        /**
         * {timeCityName} ({timeCityNameOriginal} {timeUTC}  {timeCityNameIn}
         */
        Yii::$app->params['text']['title'] = str_replace('{timeCityName}', $this->data->cityData['cityName'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{timeCityNameIn}', $this->data->cityData['cityNameIn'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{timeCityNameOriginal}', $this->data->cityData['cityNameOriginal'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{timeCityNameIn}', $this->data->cityData['cityNameIn'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{timeCityName}', $this->data->cityData['cityName'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{timeCityNameOriginal}', $this->data->cityData['cityNameOriginal'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{timeCityNameIn}', $this->data->cityData['cityNameIn'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{timeCityName}', $this->data->cityData['cityName'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{timeCityNameOriginal}', $this->data->cityData['cityNameOriginal'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{timeUTC}', $this->data->offsetSimple, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{timeCountryName}', $this->data->cityData['countryName'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{timeCityNameIn}', $this->data->cityData['cityNameIn'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{timeCityName}', $this->data->cityData['cityName'], Yii::$app->params['text']['text1']);

    }
}
