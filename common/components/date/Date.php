<?php

namespace common\components\date;

use Yii;
use yii\web\NotFoundHttpException;


class Date
{

    function __construct()
    {

    }

    function data($year){

        return (new DateData())->data($year);

    }

    function bySeason($year){

        return (new DateBySeason())->data($year);

    }

    function byMonth($year){

        return (new DateByMonth())->data($year);

    }


}

