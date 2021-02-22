<?php

namespace common\componentsV2\calendars;

use Yii;
use yii\web\NotFoundHttpException;


class CalendarsMoonLinks
{

    function calendars($year){

        $calendars[0] = [
            'name' => Yii::t('app', 'Moon phases'),
            'url' => '/' . Yii::$app->language . '/calendar/moon/phase/years/' . $year . '/',
        ];
        $calendars[1] = [
            'name' => Yii::t('app', 'New moon'),
            'url' => '/' . Yii::$app->language . '/calendar/moon/phases/years/' . $year . '/new-moon/',
        ];
        $calendars[2] = [
            'name' => Yii::t('app', 'Waxing moon'),
            'url' => '/' . Yii::$app->language . '/calendar/moon/phases/years/' . $year . '/waxing-moon/',
        ];
        $calendars[3] = [
            'name' => Yii::t('app', 'Full moon'),
            'url' => '/' . Yii::$app->language . '/calendar/moon/phases/years/' . $year . '/full-moon/',
        ];
        $calendars[4] = [
            'name' => Yii::t('app', 'Waning moon'),
            'url' => '/' . Yii::$app->language . '/calendar/moon/phases/years/' . $year . '/waning-moon/',
        ];
        $calendars[5] = [
            'name' => Yii::t('app', 'Auspicious days'),
            'url' => '/' . Yii::$app->language . '/calendar/moon/good/years/' . $year . '/',
        ];
        $calendars[6] = [
            'name' => Yii::t('app', 'Sowing calendar'),
            'url' => '/' . Yii::$app->language . '/calendar/moon/gardener/years/' . $year . '/',
        ];

        return $calendars;
    }

}

