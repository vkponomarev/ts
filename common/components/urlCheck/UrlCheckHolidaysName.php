<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckHolidaysName
{


    function name($holidayName)
    {

        if ($holidayName <> '') {

            if (!preg_match('/(?<=-)[0-9]+$/', $holidayName, $id)) {

                throw new NotFoundHttpException('404');

            }

            $id = (int)$id['0'];

            $holiday = \Yii::$app->db
                ->createCommand('
            select
            id,
            url
            from
            holidays
            where id = :id
            ', [':id' => $id])
                ->queryOne();


            if (!$holiday) {

                throw new NotFoundHttpException('404');

            } else {

                if ($holidayName <> $holiday['url']) {

                    throw new NotFoundHttpException('404');
                }

                return [
                    'url' => $holidayName,
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
