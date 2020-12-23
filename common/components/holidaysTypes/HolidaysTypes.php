<?php

namespace common\components\holidaysTypes;

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
class HolidaysTypes
{

    function __construct()
    {

    }

    function data($countryID, $yearID, $languageID){

        return (new HolidaysTypesData())->data($countryID, $yearID, $languageID);

    }



}

