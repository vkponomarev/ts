<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByHolidaysDays

{
    /**
     * @param $date \common\componentsV2\date\Date
     */
    public function update($dayName, $date, $countryData)
    {


        $dateOutput = Yii::$app->formatter->asDate($date->current, 'd MMMM y');


        Yii::$app->params['text']['title'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{country-in}', $countryData['name_in'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{country-in}', $countryData['name_in'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{country-in}', $countryData['name_in'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{date}', $dateOutput, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{country-in}', $countryData['name_in'], Yii::$app->params['text']['text1']);

    }

}