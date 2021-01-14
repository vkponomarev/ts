<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckQuarter
{


    function quarter($quarter)
    {
        //(new \common\components\dump\Dump())->printR($quarter);die;


        if (($quarter < 1) or (($quarter > 4))){
            throw new NotFoundHttpException('404');
        }

        if (!preg_match("/^[0-9]{1}$/", $quarter)) {
            throw new NotFoundHttpException('404');
        }

    }

}
