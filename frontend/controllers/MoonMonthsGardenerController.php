<?php

namespace frontend\controllers;

use common\components\albums\Albums;
use common\components\artist\Artist;
use common\components\artists\Artists;
use common\components\calendar\Calendar;
use common\components\city\City;
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
use common\components\moon\Moon;
use common\components\noDB\NoDB;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\urlCheck\UrlCheck;
use common\components\years\Years;
use Yii;
use yii\web\Controller;


class MoonMonthsGardenerController extends Controller
{

    public function actionMoonMonthGardenerPage($monthURL, $gardenerNameURL)
    {


        $textID = '98'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        /**
         * $monthURL['year']
         * $monthURL['month']
         * $monthURL['url']
         */
        $monthURL = $urlCheck->month($monthURL);
        $urlCheck->moonGardenerName($gardenerNameURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($monthURL['url'], $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($monthURL['url'], $mainUrl);
        Yii::$app->params['menu'] = $main->menu();


        $languageID = Yii::$app->params['language']['current']['id'];
        $citiesDefaultID = Yii::$app->params['language']['current']['cities_id'];
        $language = Yii::$app->params['language']['current']['url'];

        $gardenerNames = new Moon();
        $gardenerNames = $gardenerNames->gardener();

        $getParams = new GetParams();
        $getParams = $getParams->byCalendarMonthsMoon($citiesDefaultID);

        $date = new Date();
        $dateData = $date->byMonth($monthURL['url'] . '-01');

        $city = new City();
        $cityData = $city->byMoonCalendar($languageID, $getParams['city']);

        $calendar = new Calendar();
        $calendarByMonth = $calendar->byMoonMonths($monthURL, $cityData);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->yearlyMoonExists($monthURL['year'], $language);

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByCalendarMonthMoonGardener($gardenerNameURL);
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);

        $pageTextsMessages = $pageTexts->messagesByCalendarMonthMoon($dateData);
        $pageTexts->updateByCalendarMonthMoon($pageTextsMessages, $dateData, $calendarNameOfMonths);

        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        return $this->render('moon-month-gardener-page.min.php', [

            'dateData' => $dateData,
            'cityData' => $cityData,
            'gardenerNames' => $gardenerNames,
            'gardenerName' => $gardenerNameURL,
            'PDFCalendarsData' => $PDFCalendarsData,
            'calendarByMonth' => $calendarByMonth,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);

    }

}
