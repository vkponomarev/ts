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

    function yearBusiness($year){

        return (new DateByYearBusiness())->data($year);

    }

    function yearWeeks($year){

        return (new DateByYearWeeks())->data($year);

    }

    function bySeason($year){

        return (new DateBySeason())->data($year);

    }

    function byQuarter($year){

        return (new DateByQuarter())->data($year);

    }

    function byMonth($year){

        return (new DateByMonth())->data($year);

    }

    function byMonthBusiness($year){

        return (new DateByMonthBusiness())->data($year);

    }


}

