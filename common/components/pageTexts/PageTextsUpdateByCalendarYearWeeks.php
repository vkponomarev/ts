<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarYearWeeks

{

    public function update($dateData)
    {

        Yii::$app->params['text']['title'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{count_weeks}', $dateData['week']['count'], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{count_weeks}', $dateData['week']['count'], Yii::$app->params['text']['text1']);


    }

}