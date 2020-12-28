<?php

namespace common\components\getParams;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Выбираем Get параметры для календаря на год
 * Class GetParamsByCalendarYears
 * @package common\components\getParams
 */
class GetParamsByCalendarYears

{
    /**
     * Выбираем Get параметры для календаря на год
     * Если get параметр country присутствует в годах до 2000 и после 2030 кидаем 404
     * Так как нет для таких годов у нас праздников и нет смысла делать страницы для стран
     * @param $countriesID integer
     * @param $year integer
     * @param $holidaysRange array
     * @return mixed
     * @throws \yii\web\NotFoundHttpException
     */
    public function params($countriesID, $year, $holidaysRange)
    {

        if (Yii::$app->request->get('country')) {

            if ($year < $holidaysRange['start'] or $year > $holidaysRange['end'])
                throw new NotFoundHttpException('404');

            $params['country'] = Yii::$app->request->get('country');
            $params['countryGet'] = 1;


        } else {
            $params['country'] = $countriesID;
            $params['countryGet'] = 0;
        }


        return $params;

    }

}