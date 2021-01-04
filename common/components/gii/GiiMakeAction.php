<?php

namespace common\components\gii;

use Yii;

/**
 * Класс который вызывает другой контроллер для выполнения действий.
 * Здесь для выполнения генерации PDF файлов.
 * Class GiiMakeAction
 * @package common\components\gii
 */
class GiiMakeAction
{

    /**
     * Вызываем контроллер и выполняем его.
     * @param $params array Массив с параметрами.
     * @param $namespace string неймспейс контроллера.
     * @param $controller string контроллер.
     * @throws \yii\base\InvalidConfigException
     */
    function action($params, $namespace, $controller)
    {

        //$namespace = 'frontend\controllers';
        //$controller= 'countries\index';
        //print/print-calendar
        //gii/generate-pdf
        \Yii::$app->controllerNamespace = $namespace;
        //создаем экземпляр контроллера

        $ca = Yii::$app->createController($controller);

        if ($ca !== false) {

            /* @var $controller \yii\base\Controller */
            list($controller, $actionID) = $ca;

            $action = $controller->createAction($actionID);

            if ($action !== null) {
                //вызываем экшен
                //(new \common\components\dump\Dump())->printR($params);
                //die;
                //(new \common\components\dump\Dump())->printR($params);die;

                $action->runWithParams($params);


            } else {

            }
        } else {

            (new \common\components\dump\Dump())->printR('равно фальсе');
            die;

        }

    }

}
