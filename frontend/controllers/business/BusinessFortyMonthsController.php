<?php

namespace frontend\controllers\business;

use common\components\albums\Albums;
use common\components\artist\Artist;
use common\components\artists\Artists;
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
use common\components\main\Main;
use common\components\noDB\NoDB;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\urlCheck\UrlCheck;
use common\components\years\Years;
use common\componentsV2\calendars\Calendars;
use Yii;
use yii\web\Controller;


class BusinessFortyMonthsController extends Controller
{


    public function actionBusinessFortyMonthPage($monthURL, $countryURL)
    {


        $textID = '215'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        /**
         * $monthURL['year']
         * $monthURL['month']
         * $monthURL['url']
         */
        $monthURL = $urlCheck->monthBusiness($monthURL, $holidaysRange);
        /**
         * $countryURL['url']
         * $countryURL['id']
         */
        $countryURL = $urlCheck->country($countryURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($monthURL['url'], $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($monthURL['url'], $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $language = Yii::$app->params['language']['current']['url'];



        $getParams = new GetParams();
        $countryURL = $getParams->byCalendarMonths($countryURL, $monthURL['year'], $holidaysRange);

        $holidaysData = $holidays->byCountryByMonth($countryURL['id'], $monthURL['year'], $monthURL['month'], $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->byMonthBusiness($monthURL['url'] . '-01');

        ($dateToday = new \common\componentsV2\date\Date((new \DateTime())->format('Y-m-d')))->date()->year();
        $calendars = new Calendars($dateToday->year->current);

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['id']);

        $calendar = new Calendar();
        $calendarByMonth = $calendar->byMonthBusiness($monthURL, $holidaysData);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->businessExists($monthURL['year'], $language, $countryData['url']);

        $pageTexts = new PageTexts();
        //$pageTextsID = $pageTexts->defineIdByCalendarMonth($holidaysData, $PDFCalendarsData);
        Yii::$app->params['text'] = $main->text($textID, $languageID);

        $pageTextsMessages = $pageTexts->messagesByCalendarMonth($dateData, count($holidaysData));
        $pageTexts->updateByCalendarMonth($pageTextsMessages, $dateData, $countryData, count($holidaysData), $calendarNameOfMonths);

        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        return $this->render('business-forty-month-page.min.php', [

            'dateData' => $dateData,
            'countriesData' => $countriesData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'holidaysRange' => $holidaysRange,
            'PDFCalendarsData' => $PDFCalendarsData,
            'calendarByMonth' => $calendarByMonth,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'countryURL' => $countryURL,
            'calendars' => $calendars,

        ]);

    }

}
