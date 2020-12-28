<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;

/**
 * Проверка URL на сезон года
 * Class UrlCheckSeason
 * @package common\components\urlCheck
 */
class UrlCheckSeason
{

    /**
     * Проверка URL на сезон года
     * @param $season string
     * @throws \yii\web\NotFoundHttpException
     */
    function season($season)
    {
        $seasons = ['spring', 'summer', 'autumn', 'winter'];

        if (!in_array($season, $seasons)) {

            throw new NotFoundHttpException('404');

        }



    }

}
