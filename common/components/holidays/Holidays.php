<?php

namespace common\components\holidays;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Class Songs
 * @package common\components\songs
 *
 * function byAlbum($id)
 * Все песни альбома
 *
 *
 */
class Holidays
{

    function __construct()
    {

    }

    function byCountryByYear($countryID, $yearID, $languageID){

        return (new HolidaysByCountryByYear())->holidays($countryID, $yearID, $languageID);

    }

    function byCountryByYearPDFGeneration($countryID, $yearID, $languageID){

        return (new HolidaysByCountryByYearPDFGeneration())->holidays($countryID, $yearID, $languageID);

    }

    function arrayReplace($holidaysData){

        return (new HolidaysArrayReplace())->holidays($holidaysData);

    }

}

