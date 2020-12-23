<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckYear
{


    function year($url)
    {

        if (!preg_match("/^[0-9]{4}$/", $url)) {

            throw new NotFoundHttpException('404');

        }

    }

}
