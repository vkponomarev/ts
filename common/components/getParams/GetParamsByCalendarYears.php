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
     * @param $country integer
     * @param $year integer
     * @param $holidaysRange array
     * @return mixed
     * @throws \yii\web\NotFoundHttpException
     */
    public function params($country, $year, $holidaysRange)
    {

        if ($country['url'] <> '') {

            if ($year < $holidaysRange['start'] or $year > $holidaysRange['end'])
                throw new NotFoundHttpException('404');

        } else {

            $country['id'] = $country['defaultID'];

        }

        return $country;


        return $params;

    }

}