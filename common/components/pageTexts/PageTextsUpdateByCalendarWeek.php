<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarWeek

{

    public function update($dateData, $calendar, $weekURL)
    {

        Yii::$app->params['text']['title'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['title'] = str_replace('{week}', $weekURL['url'], Yii::$app->params['text']['title']);

        Yii::$app->params['text']['h1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['h1'] = str_replace('{week}', $weekURL['url'], Yii::$app->params['text']['h1']);

        Yii::$app->params['text']['description'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{week}', $weekURL['url'], Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{week_start_date}', Yii::$app->formatter->asDate($calendar['weekStartDate'], 'long'), Yii::$app->params['text']['description']);
        Yii::$app->params['text']['description'] = str_replace('{week_end_date}', Yii::$app->formatter->asDate($calendar['weekEndDate'], 'long'), Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $dateData['year']['full'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{week}', $weekURL['url'], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{week_start_date}', Yii::$app->formatter->asDate($calendar['weekStartDate'], 'long'), Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{week_end_date}', Yii::$app->formatter->asDate($calendar['weekEndDate'], 'long'), Yii::$app->params['text']['text1']);

    }

}