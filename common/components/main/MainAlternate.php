<?php

namespace common\components\main;


use Yii;

class MainAlternate
{

    function alternate()
    {

        $alternate = Yii::$app->request->pathInfo;

        return $alternate;

    }

}

