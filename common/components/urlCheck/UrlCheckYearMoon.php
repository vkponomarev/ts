<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckYearMoon
{

    function year($url)
    {

        if (((int)$url < 101) or (((int)$url > 9998))){
            throw new NotFoundHttpException('404');
        }

        if (!preg_match("/^[0-9]{4}$/", $url)) {
            throw new NotFoundHttpException('404');
        }

    }

}
