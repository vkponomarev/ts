<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByCalendarEastern

{

    /**
     * @param $date \common\componentsV2\date\Date
     * @param $eastern \common\componentsV2\eastern\Eastern
     *
     */
    public function update($date, $eastern)
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
        Yii::$app->params['text']['description'] = str_replace('{yearOf}', $eastern->text->yearsOf[$eastern->calendar->year['animal']], Yii::$app->params['text']['description']);

        Yii::$app->params['text']['text1'] = str_replace('{year}', $date->year->current, Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{yearOf}', $eastern->text->yearsOf[$eastern->calendar->year['animal']], Yii::$app->params['text']['text1']);

        Yii::$app->params['text']['text1'] = str_replace('{year-start}', Yii::$app->formatter->asDate($eastern->calendar->startDate, 'medium'), Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{year-end}', Yii::$app->formatter->asDate($eastern->calendar->endDate, 'medium'), Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{color}', $eastern->text->colors[$eastern->calendar->color], Yii::$app->params['text']['text1']);
        Yii::$app->params['text']['text1'] = str_replace('{element}', $eastern->text->elements[$eastern->calendar->element], Yii::$app->params['text']['text1']);

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