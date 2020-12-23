<?php

namespace common\components\year;

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
class Year
{

    function __construct()
    {

    }

    function data($year){

        return (new YearData())->data($year);

    }

    function bySong($yearID){

        return (new YearBySong())->data($yearID);

    }


}

