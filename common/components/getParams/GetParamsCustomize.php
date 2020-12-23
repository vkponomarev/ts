<?php

namespace common\components\getParams;

use Yii;
use yii\data\SqlDataProvider;

class GetParamsCustomize

{

    public function params()
    {

        $params = array();

        if (Yii::$app->request->get('orientation')){
            $params['orientation'] = Yii::$app->request->get('orientation');
        } else {
            $params['orientation'] = 'P';
        }

        if (Yii::$app->request->get('header')){
            $params['header'] = Yii::$app->request->get('header');
        } else {
            $params['header'] = '';
        }

        if (Yii::$app->request->get('type')){
            $params['type'] = Yii::$app->request->get('type');
        } else {
            $params['type'] = 1;
        }




        //if ($params['type'] ==4 ){
        //    $params['orientation'] = 'L';
        //}




        return $params;

    }

}