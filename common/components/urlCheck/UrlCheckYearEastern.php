<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckYearEastern
{

    /**
     * @param $url
     * @param $eastern \common\componentsV2\eastern\Eastern
     * @throws \yii\web\NotFoundHttpException
     */
    function year($url, $eastern)
    {

        if (((int)$url < $eastern->range->start) or (((int)$url > $eastern->range->end))){
            throw new NotFoundHttpException('404');
        }

        if (!preg_match("/^[0-9]{4}$/", $url)) {
            throw new NotFoundHttpException('404');
        }

    }

}
