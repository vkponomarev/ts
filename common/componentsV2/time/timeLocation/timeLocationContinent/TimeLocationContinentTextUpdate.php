<?php

namespace common\componentsV2\time\timeLocation\timeLocationContinent;

use Yii;
class TimeLocationContinentTextUpdate
{

    public $data;

    public function __construct($continentData)
    {
        $this->data = $continentData->data;

        /**
         * {timeContinentNameIn}
         * {timeContinentName}
         * {timeContinentNameOriginal}
         */
        Yii::$app->params['text']['title'] = str_replace('{timeContinentNameIn}', $this->data['nameIn'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{timeContinentName}', $this->data['name'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{timeContinentNameIn}', $this->data['nameIn'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{timeContinentName}', $this->data['name'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{timeContinentNameIn}', $this->data['nameIn'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{timeContinentName}', $this->data['name'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{timeContinentNameOriginal}', $this->data['nameOriginal'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{timeContinentNameIn}', $this->data['nameIn'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{timeContinentName}', $this->data['name'], Yii::$app->params['text']['text1']);


    }
}
