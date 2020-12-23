<?php

namespace common\components\day;

use Yii;
use yii\web\NotFoundHttpException;


class Day
{

    function __construct()
    {

    }

    function data($date){

        return (new DayData())->data($date);

    }


}

