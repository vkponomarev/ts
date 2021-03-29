<?php

namespace common\components\main;


use Yii;

class MainCanonical
{

    function canonical()
    {

        $canonical = Yii::$app->language. '/' .Yii::$app->request->pathInfo;
        //$canonical = substr(\yii\helpers\Url::base(''), 1);
        //$canonical = substr(\yii\helpers\Url::current([], false), 1);
        //$canonical = substr(Yii::$app->request->url, 1);

        return $canonical;

    }

}

