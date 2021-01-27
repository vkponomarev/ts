<?php

namespace common\components\urlCheck;


use common\components\moon\Moon;
use yii\web\NotFoundHttpException;


class UrlCheckMoonPhaseName
{


    function check($phaseName)
    {



        if ($phaseName <> ''){
            $moonPhases = (new Moon())->phasesArray();
            if (!isset($moonPhases[$phaseName])){

                throw new NotFoundHttpException('404');

            }

        } else {

            throw new NotFoundHttpException('404');

        }

    }

}
