<?php

namespace common\componentsV2\time;

use Yii;
use yii\web\NotFoundHttpException;


class TimeUTC
{

    function utc(){
        return (new \DateTime())->setTimezone(new \DateTimeZone('UTC'));
    }
}

