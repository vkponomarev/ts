<?php

namespace common\components\city;

use Yii;
use yii\web\NotFoundHttpException;


class City
{


    function byMoonCalendar($languageID, $citiesID){

        return (new CityByMoonCalendar())->data($languageID, $citiesID);

    }
}

