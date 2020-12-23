<?php

namespace common\components\countries;

use Yii;
use yii\web\NotFoundHttpException;


class Countries
{

    function __construct()
    {

    }

    function data($languageID){

        return (new CountriesData())->data($languageID);

    }

    function byPDFGeneration(){

        return (new CountriesByPDFGeneration())->data();

    }





}

