<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckEasternAnimal
{

    /**
     * @param $animal
     * @param $eastern \common\componentsV2\eastern\Eastern
     * @throws \yii\web\NotFoundHttpException
     */
    function animal($animal, $eastern)
    {


        if (!isset($eastern->animals->urls[$animal])){
            throw new NotFoundHttpException('404');
        }



    }

}
