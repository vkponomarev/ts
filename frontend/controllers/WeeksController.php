<?php

namespace frontend\controllers;

use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\date\Date;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\holidaysTypes\HolidaysTypes;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;


class WeeksController extends Controller
{


    public function actionIndex()
    {

        $url = false;
        $textID = '67'; // ID из таблицы pages
        $table = 0; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $years = new Years();
        $yearsData = $years->data();

        return $this->render('index.min.php', [

            'yearsData' => $yearsData,

        ]);


    }

    public function actionYearWeeksPage($yearURL)
    {


        $textID = '90'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->year($yearURL);
        //$weekURL = $urlCheck->week($weekURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($yearURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($yearURL, $mainUrl);

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();

        $holidaysData = $holidays->byCountryByYear($countryURL['defaultID'], $year, $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->yearWeeks($yearURL . '-01-01');

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['defaultID']);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($year);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTexts->updateByCalendarYearWeeks($dateData);

        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->yearlyWithWeeksExists($year, $language, $countryData['url']);

        return $this->render('year-weeks-page.min.php', [

            'dateData' => $dateData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'PDFCalendarsData' => $PDFCalendarsData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);

    }


    public function actionWeekPage($yearURL, $weekURL)
    {

        $textID = '91'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->year($yearURL);
        /**
         * 'url' => $week,
         * 'simple' => (int)$week,
         */
        $weekURL = $urlCheck->week($yearURL, $weekURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($yearURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($yearURL, $mainUrl);

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();
        $holidaysData = $holidays->byCountryByYear($countryURL['defaultID'], $year, $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->yearWeeks($yearURL . '-01-01');

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['defaultID']);

        $calendar = new Calendar();
        $calendarByWeek = $calendar->byMonthWeek($yearURL, $weekURL['url'], $dateData['week']['count']);
        //(new \common\components\dump\Dump())->printR($calendarByWeek);die;


        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTexts->updateByCalendarWeek($dateData, $calendarByWeek, $weekURL);

        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->yearlyExists($year, $language, $countryData['url']);


        return $this->render('week-page.min.php', [

            'dateData' => $dateData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'PDFCalendarsData' => $PDFCalendarsData,
            'calendarByWeek' => $calendarByWeek,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'weekURL' => $weekURL,
        ]);

    }

}