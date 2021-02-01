<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarYearReligion

{

    /**
     * @param $pageTextsMessages
     * @param $date \common\componentsV2\date\Date
     * @param $holidaysCount
     */
    public function update($pageTextsMessages, $date, $holidaysCount)
    {
        /**
        $pageTextsMessages['animal']
        $pageTextsMessages['leapText']
        $pageTextsMessages['firstDay']
        $pageTextsMessages['lastDay']
        */
        Yii::$app->params['text']['title'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['title']);


        Yii::$app->params['text']['h1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{leap_year}', $pageTextsMessages['leapText'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{animal}', $pageTextsMessages['animal'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{leap_year}', $pageTextsMessages['leapText'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{days_in_year}', $date->year->days, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{year_day_begin}', $pageTextsMessages['firstDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{year_day_end}', $pageTextsMessages['lastDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{holidays_count}', $pageTextsMessages['countHolidaysText'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{animal}', $pageTextsMessages['animal'], Yii::$app->params['text']['text1']);

        /**
        {year}
        {country_in}
        {country_for}
        {animal}
        {leap_year}
        {days_in_year}
        {year_day_begin}
        {year_day_end}
         */

    }

}