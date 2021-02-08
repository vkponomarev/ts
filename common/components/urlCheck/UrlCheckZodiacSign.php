<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckZodiacSign
{

    /**
     * @param $sign
     * @param $zodiac \common\componentsV2\zodiacs\Zodiacs
     * @throws \yii\web\NotFoundHttpException
     */
    function sign($sign, $zodiac)
    {

        if (!isset($zodiac->urls->keys[$sign])){
            throw new NotFoundHttpException('404');
        }

    }

}
