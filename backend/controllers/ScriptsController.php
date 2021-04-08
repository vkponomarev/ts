<?php

namespace backend\controllers;

use common\components\gii\siteMap\SiteMap;
use common\components\languages\Languages;
use common\components\textRedactors\TextNumericCopy;
use common\components\translations\TranslationsAddAll;
use common\components\translations\TranslationsAddEng;
use common\components\url\UrlMakeUrl;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;


class ScriptsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Без этого не будет работать
     */

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {

        set_time_limit(500000);
        ini_set("memory_limit", "10000M");

        if ($name = Yii::$app->request->post('name')) {

            $siteMap = new SiteMap();

            $languages = new Languages();
            $languagesData = $languages->data();

            if ($name == 'scripts-make-url') {

                (new UrlMakeUrl([
                    'tableName' => Yii::$app->request->post('table-name'),
                    'fieldName' => Yii::$app->request->post('field-name'),
                ]));

            }

            if ($name == 'scripts-add-eng-translations') {

                (new TranslationsAddEng([
                    'tableName' => Yii::$app->request->post('table-name-eng'),
                    'fieldName' => Yii::$app->request->post('field-name-eng'),
                ]));

            }

            if ($name == 'scripts-translations') {

                (new TranslationsAddAll([
                    'tableName' => Yii::$app->request->post('tableNameAll'),
                    'limitStart' => Yii::$app->request->post('limitStart'),
                    'limitEnd' => Yii::$app->request->post('limitEnd'),
                ]));

            }

        }

        return $this->render('index', [

        ]);

    }

}
