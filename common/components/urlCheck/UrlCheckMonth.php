<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckMonth
{


    function month($url)
    {


        $date = $url . '-01';
        $split = array();

        if (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $split)) {

            if (!checkdate($split[2], $split[3], $split[1]))
                throw new NotFoundHttpException('404');

        } else {

            throw new NotFoundHttpException('404');

        }

        return [
            'year' => $split[1],
            'month' => $split[2],
        ];


    }

}
