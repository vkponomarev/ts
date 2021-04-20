<?php

namespace backend\controllers;

use common\components\gii\siteMap\SiteMap;
use common\components\languages\Languages;
use common\components\textRedactors\TextNumericCopy;
use common\components\translations\TranslationsAddAll;
use common\components\translations\TranslationsAddEng;
use common\components\translations\TranslationsAddEngOne;
use common\components\translations\TranslationsAddOneField;
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

            if ($name == 'scripts-add-eng-translations-one-field') {

                (new TranslationsAddEngOne([
                    'tableName' => Yii::$app->request->post('table-name-eng-one-field'),
                    'fieldName' => Yii::$app->request->post('field-name-eng-one-field'),
                ]));

            }

            if ($name == 'scripts-translations') {


                (new TranslationsAddAll([
                    'tableName' => Yii::$app->request->post('tableNameAll'),
                    'limitStart' => Yii::$app->request->post('limitStart'),
                    'limitEnd' => Yii::$app->request->post('limitEnd'),
                ]));

            }

            if ($name == 'scripts-translations-one-field') {

                (new TranslationsAddOneField([
                    'tableName' => Yii::$app->request->post('tableNameAll'),
                    'fieldName' => Yii::$app->request->post('fieldNameAll'),
                    'limitStart' => Yii::$app->request->post('limitStart'),
                    'limitEnd' => Yii::$app->request->post('limitEnd'),
                ]));

            }


            if ($name == 'scripts-standard') {

                /*$timeZone = Yii::$app->db
                    ->createCommand('
                    select
                    *
                    from
                    time_timezone as tt
                    ')
                    ->queryAll();

                foreach ($timeZone as $zone) {

                    $timeZones = Yii::$app->db
                        ->createCommand('
                    select
                    *
                    from
                    time_timezones as tt
                    where
                    abbreviation = \'' . $zone['abbreviation'] . '\'
                    ')
                        ->queryOne();

                    //(new \common\components\dump\Dump())->printR($timeZones);die;


                    Yii::$app->db
                        ->createCommand('
                    update 
                    time_timezone
                    set
                    offset = ' . $timeZones['gmt_offset'] . '
                    where
                    id = ' . $zone['id'] . '
                    ')
                        ->execute();

                }*/

            }

        }

        return $this->render('index', [

        ]);

    }

}
