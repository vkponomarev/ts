<?php

namespace common\components\urlCheck;


use common\components\moon\Moon;
use yii\web\NotFoundHttpException;


class UrlCheckMoonGardenerName
{


    function check($gardenerName)
    {

        if ($gardenerName <> ''){
            $moonDays = (new Moon())->gardener();
            if (!isset($moonDays[$gardenerName])){

                throw new NotFoundHttpException('404');

            }

        }

    }

}
