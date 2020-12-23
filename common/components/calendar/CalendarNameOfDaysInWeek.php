<?php

namespace common\components\calendar;


use common\models\components\WomanCalendars;
use Yii;
use yii\web\NotFoundHttpException;





class CalendarNameOfDaysInWeek
{

    public function name()
    {

        $nameOfDaysInWeek[1] = Yii::$app->formatter->asDate('mon', 'php:D');
        $nameOfDaysInWeek[2] = Yii::$app->formatter->asDate('tue', 'php:D');
        $nameOfDaysInWeek[3] = Yii::$app->formatter->asDate('wed', 'php:D');
        $nameOfDaysInWeek[4] = Yii::$app->formatter->asDate('thu', 'php:D');
        $nameOfDaysInWeek[5] = Yii::$app->formatter->asDate('fri', 'php:D');
        $nameOfDaysInWeek[6] = Yii::$app->formatter->asDate('sat', 'php:D');
        $nameOfDaysInWeek[7] = Yii::$app->formatter->asDate('sun', 'php:D');

        $nameOfDaysInWeek['large'][1] = Yii::$app->formatter->asDate('mon', 'php:l');
        $nameOfDaysInWeek['large'][2] = Yii::$app->formatter->asDate('tue', 'php:l');
        $nameOfDaysInWeek['large'][3] = Yii::$app->formatter->asDate('wed', 'php:l');
        $nameOfDaysInWeek['large'][4] = Yii::$app->formatter->asDate('thu', 'php:l');
        $nameOfDaysInWeek['large'][5] = Yii::$app->formatter->asDate('fri', 'php:l');
        $nameOfDaysInWeek['large'][6] = Yii::$app->formatter->asDate('sat', 'php:l');
        $nameOfDaysInWeek['large'][7] = Yii::$app->formatter->asDate('sun', 'php:l');

        return $nameOfDaysInWeek;
    }
}
