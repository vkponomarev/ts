<?php

namespace common\components\urlCheck;


use common\components\moon\Moon;
use yii\web\NotFoundHttpException;


class UrlCheckMoonGoodDay
{


    function check($dayName)
    {

        if ($dayName <> ''){
            $moonDays = (new Moon())->days();
            if (!isset($moonDays[$dayName])){

                throw new NotFoundHttpException('404');

            }

        }

    }

}
