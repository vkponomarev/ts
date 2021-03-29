<?php

namespace common\components\main;


use Yii;
use yii\web\NotFoundHttpException;




class Main
{

    function __construct(){

    }

    function language($languageUrl){

        return (new MainLanguage())->language($languageUrl);

    }

    function languages(){

        return (new MainLanguage())->languages();

    }

    function text($textID, $languageID){

        return (new MainText())->text($textID, $languageID);

    }

    function canonical(){

        return (new MainCanonical())->canonical();

    }

    function alternate(){

        return (new MainAlternate())->alternate();

    }

    function menu(){

        return (new MainMenu())->menu();

    }

}
