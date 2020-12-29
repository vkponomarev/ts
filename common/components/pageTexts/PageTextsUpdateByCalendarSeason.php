<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarSeason

{

    public function update($pageTextsMessages, $dateData, $countryData, $holidaysCount)
    {
        /**
        $pageTextsMessages['animal']
        $pageTextsMessages['leapText']
        $pageTextsMessages['firstDay']
        $pageTextsMessages['lastDay']
        $pageTextsMessages['seasonOn']
        $pageTextsMessages['seasonWhen']
        $pageTextsMessages['seasonNow']
        */
        Yii::$app->params['text']['title'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{season_on}', $pageTextsMessages['seasonOn'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{country_for}', $countryData['name_for'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{season_on}', $pageTextsMessages['seasonOn'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{country_for}', $countryData['name_for'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{season_on}', $pageTextsMessages['seasonOn'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{season_day_begin}', $pageTextsMessages['firstDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{season_day_end}', $pageTextsMessages['lastDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{holidays_count}', $holidaysCount, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{season}', $pageTextsMessages['seasonNow'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{season_when}', $pageTextsMessages['seasonWhen'], Yii::$app->params['text']['text1']);
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