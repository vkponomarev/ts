<?php

namespace frontend\controllers\business;

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
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\calendars\Calendars;
use Yii;
use yii\web\Controller;



class BusinessQuartersController extends Controller
{

    public function actionBusinessQuarterPage($yearURL, $quarterURL, $countryURL)
    {

        $textID = '95'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $urlCheck = new UrlCheck();
        $urlCheck->yearBusiness($yearURL, $holidaysRange);
        $urlCheck->quarter($quarterURL);
        $countryURL = $urlCheck->country($countryURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($yearURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($yearURL, $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $language = Yii::$app->params['language']['current']['url'];

        $getParams = new GetParams();
        $countryURL = $getParams->byCalendarSeasons($countryURL, $yearURL, $holidaysRange);

        $holidaysData = $holidays->byCountryByQuarter($countryURL['id'], $yearURL, $languageID, $quarterURL);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->byQuarter($yearURL . '-01-01');

        ($dateToday = new \common\componentsV2\date\Date((new \DateTime())->format('Y-m-d')))->date()->year();
        ($dateDataObj = new \common\componentsV2\date\Date($yearURL . '-01-01'))->date()->year()->month()->quarter();

        $calendars = new Calendars($dateToday->year->current);
        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['id']);

        $calendar = new Calendar();
        $calendarChinese = $calendar->chineseByYear($yearURL);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $calendarByQuarters = $calendar->byQuarters($yearURL, $quarterURL, $holidaysData);

        $pageTexts = new PageTexts();
        $pageTextsMessages = $pageTexts->messagesByCalendarQuarter($dateData, $quarterURL, count($holidaysData));
        Yii::$app->params['text'] = $main->text($textID, $languageID);
        $pageTexts->updateByCalendarQuarter($pageTextsMessages, $dateData, $countryData, count($holidaysData), $quarterURL);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->calendarBusinessQuarters($dateDataObj, $quarterURL, $countryURL['url'], $countryData);

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->businessExists($yearURL, $language, $countryData['url']);

        return $this->render('business-quarter-page.min.php', [


            'quarterURL' => $quarterURL,
            'dateData' => $dateData,
            'countriesData' => $countriesData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'holidaysRange' => $holidaysRange,
            'PDFCalendarsData' => $PDFCalendarsData,
            'calendarByQuarters' => $calendarByQuarters,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'countryURL' => $countryURL,
            'pageTextsMessages' => $pageTextsMessages,
            'calendars' => $calendars,

        ]);

    }

}
