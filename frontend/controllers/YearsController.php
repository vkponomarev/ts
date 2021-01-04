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


/**
 * Main controller
 * pageText($currentPage,$pageUsingKeys)
 *
 *
 *
 *
 */
class YearsController extends Controller
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

    public function actionYearPage($yearURL, $countryURL)
    {


        $textID = '74'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->year($yearURL);
        $countryURL = $urlCheck->country($countryURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($yearURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($yearURL, $mainUrl);

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $getParams = new GetParams();
        $countryURL = $getParams->byCalendarYears($countryURL, $year, $holidaysRange);

        $holidaysData = $holidays->byCountryByYear($countryURL['id'], $year, $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        //(new \common\components\dump\Dump())->printR($holidaysData);
        //die;
        //$holidaysTypes = new HolidaysTypes();
        //$holidaysTypesData = $holidaysTypes->data($countryID, $year, $languageID);

        $date = new Date();
        $dateData = $date->data($yearURL . '-01-01');

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['id']);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($year);
        $calendarChinese = $calendar->chineseByYear($year);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByCalendarYear($holidaysData, $calendarChinese);
        $pageTextsMessages = $pageTexts->messagesByCalendarYear($calendarChinese, $dateData);
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);
        $pageTexts->updateByCalendarYear($pageTextsMessages, $dateData, $countryData, count($holidaysData));
        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->yearlyExists($year, $language, $countryData['url']);


        return $this->render('year-page.min.php', [

            'dateData' => $dateData,
            'countriesData' => $countriesData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'holidaysRange' => $holidaysRange,
            'PDFCalendarsData' => $PDFCalendarsData,
            //'holidaysTypesData' => $holidaysTypesData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'countryURL' => $countryURL,


        ]);

    }

}