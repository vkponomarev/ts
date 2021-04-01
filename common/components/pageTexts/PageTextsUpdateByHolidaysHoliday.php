<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByHolidaysHoliday

{
    /**
     * @param $date \common\componentsV2\date\Date
     * @param $countryData
     * @param $holidayData
     */
    public function update($date, $countryData, $holidayData, $holidaysData)
    {

        if (!isset($holidaysData[0]['holidayTypeName'])){

            $holidayTypeName = $holidayData['holidayTypeName'];

        } else {

            $holidayTypeName = $holidaysData[0]['holidayTypeName'];

        }

        Yii::$app->params['text']['title'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{holiday}', $holidayData['holidayName'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{holiday}', $holidayData['holidayName'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{holiday}', $holidayData['holidayName'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{holiday-original}', $holidayData['holidayNameOriginal'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{country_in}', $countryData['name_in'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{holiday}', $holidayData['holidayName'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{holiday-type}', $holidayTypeName, Yii::$app->params['text']['text1']);


    }

}