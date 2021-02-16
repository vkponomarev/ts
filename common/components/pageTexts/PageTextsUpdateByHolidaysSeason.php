<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByHolidaysSeason

{
    /**
     * @param $date \common\componentsV2\date\Date
     */
    public function update($date)
    {

        Yii::$app->params['text']['title'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['text1']);


    }

}