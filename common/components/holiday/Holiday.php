<?php

namespace common\components\holiday;

use Yii;
use yii\web\NotFoundHttpException;


class Holiday
{

    function __construct()
    {

    }

    function byID($holidayID, $languageID){

        return (new HolidayByID())->data($holidayID, $languageID);

    }


}

