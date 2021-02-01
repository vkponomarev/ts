<?php

namespace common\components\urlCheck;


use Yii;
use yii\web\NotFoundHttpException;




class Url
{


    public $url;

    public $id;

    public $year;

    public $this;



    //function __construct($url){
   //     $this->url = $url;
    //}


    function id($url){

        return (new UrlCheckID())->id($url);

    }

    function year($url){

        (new UrlCheckYear())->year($url);

    }

    function yearBusiness($url, $holidaysRange){

        (new UrlCheckYearBusiness())->year($url, $holidaysRange);

    }

    function yearReligion($url, $holidaysRange){

        (new UrlCheckYearReligion())->year($url, $holidaysRange);

    }

    function yearMoon($url){

        (new UrlCheckYearMoon())->year($url);

    }


    function moonGoodDay($dayName){

        (new UrlCheckMoonGoodDay())->check($dayName);

    }

    function moonGardenerName($gardenerName){

        (new UrlCheckMoonGardenerName())->check($gardenerName);

    }

    function moonPhaseName($phaseName){

        (new UrlCheckMoonPhaseName())->check($phaseName);

    }

    function country($countryURL){

        return (new UrlCheckCountry())->check($countryURL);

    }


    /**
     * Проверка URL на сезон года
     * @param $season string
     * @throws \yii\web\NotFoundHttpException
     */
    function season($season){

        (new UrlCheckSeason())->season($season);

    }

    function quarter($quarter){

        (new UrlCheckQuarter())->quarter($quarter);

    }


    function month($url){

        return (new UrlCheckMonth())->month($url);

    }

    function monthBusiness($url, $holidaysRange){

        return (new UrlCheckMonthBusiness())->month($url, $holidaysRange);

    }


    /**
     * Проверяем URL если в урл что то не так выдаем 404
     * @param $year integer
     * @param $week integer двузначное число номер недели например 05, 32
     * @return array {foo: string, bar: int}
     * @throws \yii\web\NotFoundHttpException
     */
    function week($year, $week){

        return (new UrlCheckWeek())->check($year, $week);

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
