<?php

namespace common\componentsV2\calendars;

use Yii;
use yii\web\NotFoundHttpException;


class CalendarsLinks
{

    function calendars($year){

        $calendars[1] = [
            'name' => Yii::t('app', 'Calendar'),
            'url' => '/' . Yii::$app->language . '/calendar/years/' . $year . '/',
        ];
        $calendars[2] = [
            'name' => Yii::t('app', 'Calendar with week numbers'),
            'url' => '/' . Yii::$app->language . '/calendar/weeks/' . $year . '/',
        ];
        $calendars[3] = [
            'name' => Yii::t('app', 'Business days calendar'),
            'url' => '/' . Yii::$app->language . '/calendar/business/years/' . $year . '/',
        ];
        $calendars[4] = [
            'name' => Yii::t('app', 'Lunar Calendar'),
            'url' => '/' . Yii::$app->language . '/calendar/moon/years/' . $year . '/',
        ];
        $calendars[5] = [
            'name' => Yii::t('app', 'Eastern calendar'),
            'url' => '/' . Yii::$app->language . '/calendar/eastern/',
        ];
        $calendars[6] = [
            'name' => Yii::t('app', 'Zodiac Signs Calendar'),
            'url' => '/' . Yii::$app->language . '/calendar/zodiac/years/' . $year . '/',
        ];
        return $calendars;
    }



}

