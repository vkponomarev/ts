<?php

namespace common\components\country;

use Yii;
use yii\web\NotFoundHttpException;


class Country
{

    function __construct()
    {

    }

    function data($languageID, $countriesID){

        return (new CountryData())->data($languageID, $countriesID);

    }

    function byPDFGeneration($languageID, $countriesID){

        return (new CountryByPDFGeneration())->data($languageID, $countriesID);

    }

    function byMoonCalendar($languageID, $citiesID){

        return (new CountryByMoonCalendar())->data($languageID, $citiesID);

    }
}

