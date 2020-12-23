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
class Month
{

    function __construct()
    {

    }

    function data($date){

        return (new MonthData())->data($date);

    }

    function bySong($yearID){

        return (new YearBySong())->data($yearID);

    }


}

