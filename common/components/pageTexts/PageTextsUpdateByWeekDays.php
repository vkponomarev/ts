<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByWeekDays

{
    /**
     * @param $date \common\componentsV2\date\Date
     * @param $calendarNameOfDaysInWeek
     * @throws \yii\base\InvalidConfigException
     */
    public function update($date, $calendarNameOfDaysInWeek)
    {

        /**
         * {date}
         * {week-current}
         * {week-day-name}
         * {week-day}
         */
        $dateOutput = Yii::$app->formatter->asDate($date->current, 'd MMMM y');

        Yii::$app->params['text']['title'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{week-current}', $date->week->current, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{week-day-name}', $calendarNameOfDaysInWeek['large'][$date->week->dayNumber], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{week-day}', $date->week->dayNumber, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{week-current}', $date->week->current, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{week-day-name}', $calendarNameOfDaysInWeek['large'][$date->week->dayNumber], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{week-day}', $date->week->dayNumber, Yii::$app->params['text']['text1']);

    }

}