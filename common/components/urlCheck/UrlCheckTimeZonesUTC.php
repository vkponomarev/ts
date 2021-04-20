<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckTimeZonesUTC
{


    function check($zoneNameURL, $zoneTime)
    {

        if ($zoneNameURL == 'utc') {

            date("H:i:s", mktime(0, 0, 13600)
            $zone = \Yii::$app->db
                ->createCommand('
            select
            id,
            url
            from
            time_timezone
            where id = :id
            ', [':id' => $id])
                ->queryOne();


            if (!$zone) {

                throw new NotFoundHttpException('404');

            } else {

                if ($zoneURL <> $zone['url']) {

                    throw new NotFoundHttpException('404');
                }

                return [
                    'url' => $zoneURL,
                    'id' => $id,
                ];

            }

        }

        return [
            'url' => '',
            'id' => 0,
        ];
    }

}
