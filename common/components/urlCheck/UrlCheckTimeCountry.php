<?php

namespace common\components\urlCheck;


use Yii;
use yii\web\NotFoundHttpException;


class UrlCheckTimeCountry
{

    public function check($countryURL)
    {

        if ($countryURL <> '') {

            if (!preg_match('/(?<=-)[0-9]+$/', $countryURL, $id)) {

                throw new NotFoundHttpException('404');

            }

            $id = (int)$id['0'];

            $country = Yii::$app->db
                ->createCommand('
            select
            id,
            url
            from
            time_countries
            where id = :id
            ', [':id' => $id])
                ->queryOne();


            if (!$country) {

                throw new NotFoundHttpException('404');

            } else {

                if ($countryURL <> $country['url']) {

                    throw new NotFoundHttpException('404');
                }

                return [
                   'url' => $countryURL,
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
