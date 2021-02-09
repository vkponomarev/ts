<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckHolidaysYear
{


    function year($year, $holidaysRange)
    {

        if (!preg_match("/^[0-9]{4}$/", $year)) {
            throw new NotFoundHttpException('404');
        }

        if ($year < $holidaysRange['start'] or $year > $holidaysRange['end'])
            throw new NotFoundHttpException('404');

    }

}
