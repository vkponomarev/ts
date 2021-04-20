<?php

namespace common\componentsV2\time;

use Yii;
use yii\web\NotFoundHttpException;


class TimeUTC
{

    function utc(){
        return \DateTime::createFromFormat(
            'Y-m-d G:i',
            (new \DateTime())->format('Y-m-d G:i'),
            new \DateTimeZone('UTC')
        );
    }
}

