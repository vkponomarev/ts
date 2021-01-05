<?php

namespace backend\controllers;

use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\date\Date;
use common\components\gii\giiPDF\GiiPDF;
use common\components\gii\siteMap\SiteMap;
use common\components\gii\view\View;
use common\components\holidays\Holidays;
use common\components\languages\Languages;
use common\components\main\Main;
use common\components\textRedactors\TextNumericCopy;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Class GiiViewController
 * @package backend\controllers
 * Каласс генерации файлов
 * Генерация PDF файлов календарей
 */
class GiiViewController extends Controller
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

    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex()
    {

        //Yii::$app->view->registerCssFile("/var/www/timesles.loc/frontend/web/css/scss/main.css");

        /*$this->registerCssFile("@web/css/scss/main.css", [
            'media' => 'print',
        ], 'css-print-theme');*/
        /**
         * 1. Создаем файлы для артистов
         * 2. Создаем файлы для альбомов
         * 3. Создаем файлы для песен
         * 4. Создаем файл индекса карты сайтов
         */

        //\Yii::$app->runAction("/countries");
        //\Yii::$app->controllerNamespace = 'frontend\controllers'; //change current controller
        //\Yii::$app->runAction('print/print-calendar',[
        //    'test' => 'testssss',
        //]); //run the Action

        //$request = Yii::$app->request;
        //$request->setUrl($url);
        //list($route, $params) = $request->resolve();

        //return false;



        if ($name = Yii::$app->request->post('name')) {

            $valueOne = Yii::$app->request->post('value-one');
            $valueTwo = Yii::$app->request->post('value-two');

            $giiPDF = new GiiPDF();
            $languages = new Languages();
            $languagesData = $languages->data();

            //<option value="PDF-calendar-yearly">Создание PDF Календаря на год</option>
            if ($name == 'PDF-calendar-yearly') {

                $giiPDF->generatePDFCalendarYearly($languagesData);
            }

            if ($name == 'PDF-calendar-seasons') {

                $giiPDF->generatePDFCalendarSeasons($languagesData);
            }

            if ($name == 'PDF-calendar-monthly') {

                $giiPDF->generatePDFCalendarMonths($languagesData);
            }

        }
        return $this->render('index', [

        ]);


/*
        $PDFCalendarYearlyPages = [
            1 => 'calendar-yearly-portrait-one',
            2 => 'calendar-yearly-landscape-one',
        ];

        //$countryData = $country->byPDFGeneration($language['id'], $eachCountry['id']);

        //Yii::$app->language = $language['url'];

        //$this->layout = "print";
        $url = false;
        $textID = '1'; // ID из таблицы pages
        $table = 'pages'; // К какой таблице отностся данная страница
        $mainUrl = false; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryID = 171;
        $year = 2020;


        $date = new Date();
        $dateData = $date->data('2020-01-01');

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $country = new Country();
        $countryData = $country->data($languageID, $countryID);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($dateData['year']['full']);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $holidays = new Holidays();
        $holidaysData = $holidays->byCountryByYearPDFGeneration($countryData['id'], $year, $languageID);

        $getParamsCustomize['header'] ='';

        $isHolidays = ($holidaysData) ? '' : '-no-holidays';
        Yii::$app->view->registerCssFile("/var/www/timesles.loc/frontend/web/css/scss/main.css");

        return $this->render('@frontend/views/print/' . $PDFCalendarYearlyPages[1] . $isHolidays . '.min.php', [
            'dateData' => $dateData,
            'countryData' => $countryData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'holidaysData' => $holidaysData,
            'getParamsCustomize' => $getParamsCustomize,
        ]);
        */


    }


}
