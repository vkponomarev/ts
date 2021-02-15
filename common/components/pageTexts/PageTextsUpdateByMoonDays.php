<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByMoonDays

{
    /**
     * @param $dayName
     * @param $date \common\componentsV2\date\Date
     * @param $moonDay
     * @throws \yii\base\InvalidConfigException
     */
    public function update($dayName, $date, $moonDay)
    {

        $dateOutput = Yii::$app->formatter->asDate($date->current, 'd MMMM y');

        Yii::$app->params['text']['title'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{moon-day}', $moonDay, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{moon-day}', $moonDay, Yii::$app->params['text']['text1']);

    }

}