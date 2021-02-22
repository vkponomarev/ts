<?php

namespace common\componentsV2\calendars;

use Yii;
use yii\web\NotFoundHttpException;


class CalendarsBusinessLinks
{

    function calendars($year){

        $calendars[1] = [
            'name' => Yii::t('app', 'Working days'),
            'url' => '/' . Yii::$app->language . '/calendar/working/years/' . $year . '/',
        ];
        $calendars[2] = [
            'name' => Yii::t('app', 'Days off'),
            'url' => '/' . Yii::$app->language . '/calendar/days-off/years/' . $year . '/',
        ];
        $calendars[3] = [
            'name' => Yii::t('app', 'Six day work week'),
            'url' => '/' . Yii::$app->language . '/calendar/business/six-days/years/' . $year . '/',
        ];
        $calendars[4] = [
            'name' => Yii::t('app', '36 hour work week'),
            'url' => '/' . Yii::$app->language . '/calendar/business/thirty/years/' . $year . '/',
        ];
        $calendars[5] = [
            'name' => Yii::t('app', '40 hour work week'),
            'url' => '/' . Yii::$app->language . '/calendar/business/forty/years/' . $year . '/',
        ];
        return $calendars;
    }

}

