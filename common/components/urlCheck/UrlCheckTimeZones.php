<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckTimeZones
{


    function check($zoneURL)
    {

        if ($zoneURL <> '') {

            if (!preg_match('/(?<=-)[0-9]+$/', $zoneURL, $id)) {

                throw new NotFoundHttpException('404');

            }

            $id = (int)$id['0'];

            $zone = \Yii::$app->db
                ->createCommand('
            select
            id,
            url,
            diff_time
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
                    'diffTime' => $zone['diff_time'],
                ];

            }

        }

        return [
            'url' => '',
            'id' => 0,
            'diffTime' => 0,
        ];
    }

}
