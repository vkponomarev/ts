<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarEasternAnimal

{

    /**
     * @param $eastern \common\componentsV2\eastern\Eastern
     * @throws \yii\base\InvalidConfigException
     */
    public function update($eastern)
    {
        /**
        $pageTextsMessages['animal']
        $pageTextsMessages['leapText']
        $pageTextsMessages['firstDay']
        $pageTextsMessages['lastDay']
        */






        Yii::$app->params['text']['title'] = str_replace('{year-of}', $eastern->animal->yearOf, Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{year-of-capital}', $eastern->animal->yearOfCapital, Yii::$app->params['text']['title']);


        Yii::$app->params['text']['h1'] = str_replace('{year-of-capital}', $eastern->animal->yearOfCapital, Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year-of}', $eastern->animal->yearOf, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{year-of-capital}', $eastern->animal->yearOfCapital, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year-of}', $eastern->animal->yearOf, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{year-of-capital}', $eastern->animal->yearOfCapital, Yii::$app->params['text']['text1']);


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