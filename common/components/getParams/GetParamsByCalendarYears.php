<?php

namespace common\components\getParams;

use Yii;
use yii\data\SqlDataProvider;

class GetParamsByCalendarYears

{

    public function params($countriesID)
    {

        if (Yii::$app->request->get('country')){
            $params['country'] = Yii::$app->request->get('country');
        } else {
            $params['country'] = $countriesID;
        }

        return $params;

    }

}