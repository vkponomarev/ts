<?php

namespace frontend\controllers;

use common\components\albums\Albums;
use common\components\artist\Artist;
use common\components\artists\Artists;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\date\Date;
use common\components\featuring\Featuring;
use common\components\firstLetter\FirstLetter;
use common\components\genre\Genre;
use common\components\genres\Genres;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\links\Links;
use common\components\main\Main;
use common\components\noDB\NoDB;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\urlCheck\UrlCheck;
use common\components\year\Year;
use common\components\years\Years;
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
class SeasonsController extends Controller
{


    public function actionIndex()
    {


    }

    public function actionSeason($season, $year)
    {

        $textID = '68'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->year($year);
        $urlCheck->season($season);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($year, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($year, $mainUrl);

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryID = Yii::$app->params['language']['current']['countries_id'];
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $getParams = new GetParams();
        $getParamsByCalendarYears = $getParams->byCalendarYears($countryID, $year, $holidaysRange);
        $countryID = $getParamsByCalendarYears['country'];

        $holidaysData = $holidays->byCountryByYear($countryID, $year, $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        //(new \common\components\dump\Dump())->printR($holidaysData);
        //die;
        //$holidaysTypes = new HolidaysTypes();
        //$holidaysTypesData = $holidaysTypes->data($countryID, $year, $languageID);

        $date = new Date();
        $dateData = $date->data($year . '-01-01');

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $country = new Country();
        $countryData = $country->data($languageID, $getParamsByCalendarYears['country']);

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


        return $this->render('season-page.min.php', [

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
            'getParamsByCalendarYears' => $getParamsByCalendarYears,

        ]);

    }




    public function actionWinter($urlYear)
    {


        $textID = '68'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();

        $urlCheckID = $urlCheck->year($urlYear);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($urlYear, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($urlYear, $mainUrl);

        $yearData['current'] = $urlYear;
        $yearData['previous'] = $urlYear-1;
        $yearData['next'] = $urlYear+1;

        $calendar = new Calendar();
        $calendarBySeasonsWinter = $calendar->bySeasonsWinter($urlYear);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        return $this->render('winter.min.php', [

            'yearData' => $yearData,
            'calendarBySeasonsWinter' => $calendarBySeasonsWinter,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);

    }


    public function actionSpring($urlYear)
    {


        $textID = '68'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();

        $urlCheckID = $urlCheck->year($urlYear);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($urlYear, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($urlYear, $mainUrl);

        $yearData['current'] = $urlYear;
        $yearData['previous'] = $urlYear-1;
        $yearData['next'] = $urlYear+1;

        $calendar = new Calendar();
        $calendarBySeasonsSpring = $calendar->bySeasonsSpring($urlYear);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        return $this->render('spring.min.php', [

            'yearData' => $yearData,
            'calendarBySeasonsSpring' => $calendarBySeasonsSpring,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);

    }

    public function actionSummer($urlYear)
    {


        $textID = '68'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();

        $urlCheckID = $urlCheck->year($urlYear);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($urlYear, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($urlYear, $mainUrl);

        $yearData['current'] = $urlYear;
        $yearData['previous'] = $urlYear-1;
        $yearData['next'] = $urlYear+1;

        $calendar = new Calendar();
        $calendarBySeasonsSummer = $calendar->bySeasonsSummer($urlYear);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        return $this->render('summer.min.php', [

            'yearData' => $yearData,
            'calendarBySeasonsSummer' => $calendarBySeasonsSummer,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);

    }


    public function actionAutumn($urlYear)
    {


        $textID = '68'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();

        $urlCheckID = $urlCheck->year($urlYear);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($urlYear, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($urlYear, $mainUrl);

        $yearData['current'] = $urlYear;
        $yearData['previous'] = $urlYear-1;
        $yearData['next'] = $urlYear+1;

        $calendar = new Calendar();
        $calendarBySeasonsAutumn = $calendar->bySeasonsAutumn($urlYear);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        return $this->render('autumn.min.php', [

            'yearData' => $yearData,
            'calendarBySeasonsAutumn' => $calendarBySeasonsAutumn,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);

    }


}
