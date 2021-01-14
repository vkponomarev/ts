<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarQuarter

{

    public function update($pageTextsMessages, $dateData, $countryData, $holidaysCount, $quarterURL)
    {

        Yii::$app->params['text']['title'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{quarter}', $quarterURL, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{country_for}', $countryData['name_for'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{quarter}', $quarterURL, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{country_for}', $countryData['name_for'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{quarter}', $quarterURL, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{quarter_day_begin}', $pageTextsMessages['firstDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{quarter_day_end}', $pageTextsMessages['lastDay'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{holidays_count}', $pageTextsMessages['countHolidaysText'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{quarter}', $quarterURL, Yii::$app->params['text']['text1']);

    }

}