<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarZodiacMonth

{
    /**
     * @param $date \common\componentsV2\date\Date
     * @param $calendarNameOfMonths
     */
    public function update($date, $calendarNameOfMonths)
    {


        Yii::$app->params['text']['title'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month_count}', $date->month->simple, Yii::$app->params['text']['text1']);
    }

}