<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckTimeZonesZoneTime
{


    function check($zoneTime, $zoneURL)
    {

        if (!$zoneURL['diffTime']){

            throw new NotFoundHttpException('404');

        }

        $zoneTime = \Yii::$app->db
            ->createCommand('
            select
            id,
            url
            from
            time_timezone_offset
            where url = :zoneTime
            ', [':zoneTime' => $zoneTime])
            ->queryOne();


        if (!$zoneTime) {

            throw new NotFoundHttpException('404');

        }

    }

}
