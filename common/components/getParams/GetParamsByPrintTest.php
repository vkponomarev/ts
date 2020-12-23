<?php

namespace common\components\getParams;

use Yii;
use yii\data\SqlDataProvider;

class GetParamsByPrintTest

{

    public function params()
    {

        if (Yii::$app->request->get('page')){
            $params['page'] = Yii::$app->request->get('page');
        } else {
            $params['page'] = 'calendar-yearly-portrait-one';
        }

        if (Yii::$app->request->get('orientation')){
            $params['orientation'] = Yii::$app->request->get('orientation');
        } else {
            $params['orientation'] = 'P';
        }


        return $params;

    }

}