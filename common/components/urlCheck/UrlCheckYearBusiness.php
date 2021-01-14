<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckYearBusiness
{


    function year($url, $holidaysRange)
    {

        if (((int)$url < $holidaysRange['start']) or (((int)$url > $holidaysRange['end']))){
            throw new NotFoundHttpException('404');
        }

        if (!preg_match("/^[0-9]{4}$/", $url)) {
            throw new NotFoundHttpException('404');
        }

    }

}
