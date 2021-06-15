<?php

namespace common\components\urlCheck;


use Yii;
use yii\web\NotFoundHttpException;


class UrlCheckTimeContinent
{

    public function check($continentURL)
    {

        if ($continentURL <> '') {
            if (!preg_match('/(?<=-)[0-9]+$/', $continentURL, $id)) {
                throw new NotFoundHttpException('404');
            }
            $id = (int)$id['0'];

            $continent = Yii::$app->db
                ->createCommand('
            select
            id,
            code,
            url
            from
            time_continents
            where id = :id
            ', [':id' => $id])
                ->queryOne();

            if (!$continent) {

                throw new NotFoundHttpException('404');

            } else {

                if ($continentURL <> $continent['url']) {

                    throw new NotFoundHttpException('404');
                }

                return [
                   'url' => $continentURL,
                   'code' => $continent['code'],
                   'id' => $id,
                ];

            }

        }

        return [
            'url' => '',
            'code' => '',
            'id' => 0,
        ];
    }

}
