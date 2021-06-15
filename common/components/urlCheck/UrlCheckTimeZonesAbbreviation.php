<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckTimeZonesAbbreviation
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
            abbreviation,
            url
            from
            time_timezone
            where id = :id
            and active = 1
            ', [':id' => $id])
                ->queryOne();


            if (!$zone) {

                throw new NotFoundHttpException('404');

            } else {

                if ($zoneURL <> $zone['url']) {

                    throw new NotFoundHttpException('404');
                }

                return [
                    'abbreviation' => mb_strtolower($zone['abbreviation'], 'UTF-8'),
                    'url' => $zoneURL,
                    'id' => $id,
                ];

            }

        }

        return [
            'abbreviation' => '',
            'url' => '',
            'id' => 0,
        ];
    }

}
