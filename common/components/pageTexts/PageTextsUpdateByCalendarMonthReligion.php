<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarMonthReligion

{

    /**
     * @param $pageTextsMessages
     * @param $date \common\componentsV2\date\Date
     * @param $calendarNameOfMonths
     */
    public function update($pageTextsMessages, $date, $calendarNameOfMonths)
    {
        /**
        {month} dateData
        {year} dateData
        {country_for}
        {country_in}
        {month_days_count} dateData
        {month_count} dateData
        {season} pageTextsMessages
        {month_day_begin} pageTextsMessages
        {month_day_end} pageTextsMessages
        {holidays_count}
        */

        Yii::$app->params['text']['title'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month}', $calendarNameOfMonths[$date->month->simple], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month_count}', $date->month->simple, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month_days_count}', $pageTextsMessages['countDays'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month_day_begin}', $pageTextsMessages['firstDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month_day_end}', $pageTextsMessages['lastDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{holidays_count}', $pageTextsMessages['countHolidaysText'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{season}', $pageTextsMessages['season'], Yii::$app->params['text']['text1']);
    }

}