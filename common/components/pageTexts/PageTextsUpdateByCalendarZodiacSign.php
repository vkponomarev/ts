<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarZodiacSign

{
    /**
     * @param $zodiacs \common\componentsV2\zodiacs\Zodiacs
     */
    public function update($zodiacs)
    {

        $dateStart = Yii::$app->formatter->asDate('2021-' . $zodiacs->zodiac->range['start'], 'd MMMM');
        $dateEnd = Yii::$app->formatter->asDate('2021-' . $zodiacs->zodiac->range['end'], 'd MMMM');


        Yii::$app->params['text']['title'] = str_replace('{name}', $zodiacs->zodiac->name, Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{name-capital}', $zodiacs->zodiac->nameCapital, Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{name}', $zodiacs->zodiac->name, Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{name-capital}', $zodiacs->zodiac->nameCapital, Yii::$app->params['text']['h1']);


        Yii::$app->params['text']['description'] = str_replace('{name}', $zodiacs->zodiac->name, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{name-capital}', $zodiacs->zodiac->nameCapital, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{date-start}', $dateStart, Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{date-end}', $dateEnd, Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{name}', $zodiacs->zodiac->name, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{name-capital}', $zodiacs->zodiac->nameCapital, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{date-start}', $dateStart, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{date-end}', $dateEnd, Yii::$app->params['text']['text1']);

    }

}