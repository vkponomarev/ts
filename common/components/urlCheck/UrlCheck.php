<?php

namespace common\components\urlCheck;


use Yii;
use yii\web\NotFoundHttpException;




class UrlCheck
{


    function __construct(){


    }


    function id($url){

        return (new UrlCheckID())->id($url);

    }

    function year($url){

        (new UrlCheckYear())->year($url);

    }

    function month($url){

        return (new UrlCheckMonth())->month($url);

    }

    function day($url){

        return (new UrlCheckDay())->day($url);

    }


    function trueUrl($id, $table){

        return (new UrlCheckTrueUrl())->trueUrl($id, $table);

    }

    function check($url, $trueUrl){

        return (new UrlCheckCheck())->check($url, $trueUrl);

    }

    function checkNoDB($realPath, $path, $file){

        return (new UrlCheckCheckNoDB())->check($realPath, $path, $file);

    }

}
