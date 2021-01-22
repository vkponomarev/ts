<?php

namespace common\components\moon;

use Yii;
use yii\web\NotFoundHttpException;

class Moon
{

    function __construct()
    {

    }

    function pictures($weekDay, $calendar){

        return (new MoonPictures())->pictures($weekDay, $calendar);

    }




}

