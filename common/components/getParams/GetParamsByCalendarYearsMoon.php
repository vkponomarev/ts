<?php

namespace common\components\getParams;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Выбираем Get параметры для Лунного календаря на год
 * Class GetParamsByCalendarYears
 * @package common\components\getParams
 */
class GetParamsByCalendarYearsMoon

{

    public function params($cityDefaultID)
    {

        if (Yii::$app->request->get('city')){
            $params['city'] = Yii::$app->request->get('city');
        } else {
            $params['city'] = $cityDefaultID;
        }

        return $params;

    }

}