<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckYear
{


    function year($url)
    {

        if (((int)$url < 0001) or (((int)$url > 9999))){
            throw new NotFoundHttpException('404');
        }

        if (!preg_match("/^[0-9]{4}$/", $url)) {
            throw new NotFoundHttpException('404');
        }

    }

}
