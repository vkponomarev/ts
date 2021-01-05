<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarMonth

{

    public function update($pageTextsMessages, $dateData, $countryData, $holidaysCount, $calendarNameOfMonths)
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

        Yii::$app->params['text']['title'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{month}', $calendarNameOfMonths[$dateData['month']['numberSimple']], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{month}', $calendarNameOfMonths[$dateData['month']['numberSimple']], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{country_for}', $countryData['name_for'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{month}', $calendarNameOfMonths[$dateData['month']['numberSimple']], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{country_for}', $countryData['name_for'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month}', $calendarNameOfMonths[$dateData['month']['numberSimple']], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month_count}', $dateData['month']['numberSimple'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month_days_count}', $pageTextsMessages['countDays'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month_day_begin}', $pageTextsMessages['firstDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{month_day_end}', $pageTextsMessages['lastDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{holidays_count}', $pageTextsMessages['countHolidaysText'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{season}', $pageTextsMessages['season'], Yii::$app->params['text']['text1']);
    }

}