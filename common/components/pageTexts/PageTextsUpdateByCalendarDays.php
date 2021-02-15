<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarDays

{
    /**
     * @param $dayName
     * @param $date \common\componentsV2\date\Date
     * @throws \yii\base\InvalidConfigException
     */
    public function update($date, $calendarNameOfMonths)
    {

        /**
         *
         */
        $dateOutput = Yii::$app->formatter->asDate($date->current, 'd MMMM y');

        Yii::$app->params['text']['title'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{week-day}', $date->day->name, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{week-day}', $date->day->name, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{week-day}', $date->day->name, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['text1']);

    }

}