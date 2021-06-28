<?php

namespace common\componentsV2\namaz;

use Yii;
class NamazCityTextUpdate
{

    /**
     * NamazCityTextUpdate constructor.
     * @param $date \common\componentsV2\date\Date
     */
    public function __construct($date)
    {

        /**
         * {timeCityName} ({timeCityNameOriginal} {timeUTC}  {timeCityNameIn}
         */
        Yii::$app->params['text']['title'] = str_replace('{month}', $date->month->nameFullSimple, Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{month}', $date->month->nameFullSimple, Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{month}', $date->month->nameFullSimple, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{month}', $date->month->nameFullSimple, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['text1']);

    }
}
