<?php

namespace common\components\urlCheck;


use Yii;
use yii\web\NotFoundHttpException;


class UrlCheckTimeCity
{

    public function check($cityURL, $cityURL2 = 0)
    {

        if ($cityURL <> '') {

            if (!preg_match('/(?<=-)[0-9]+$/', $cityURL, $id)) {

                throw new NotFoundHttpException('404');

            }

            $id = (int)$id['0'];

            if ((isset($cityURL2['id'])) &&  ($cityURL2['id'] == $id)){
                throw new NotFoundHttpException('404');
            }

            $city = Yii::$app->db
                ->createCommand('
            select
            id,
            url
            from
            time_cities
            where id = :id
            ', [':id' => $id])
                ->queryOne();


            if (!$city) {

                throw new NotFoundHttpException('404');

            } else {

                if ($cityURL <> $city['url']) {

                    throw new NotFoundHttpException('404');
                }

                return [
                   'url' => $cityURL,
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
