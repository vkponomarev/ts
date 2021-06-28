<?php

namespace frontend\controllers\namaz;

use common\components\breadcrumbs\BreadcrumbsNamazCitiesCityMonths;
use common\components\breadcrumbs\BreadcrumbsNamazCitiesCityYears;
use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\date\Date;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\calendars\Calendars;
use common\componentsV2\namaz\Namaz;
use common\componentsV2\time\Time;
use Yii;
use yii\web\Controller;


class NamazCitiesCityMonthsController extends Controller
{


    public function actionNamazCitiesCityMonthPage($monthURL, $cityURL)
    {

        $textID = '299'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        /**
         * $monthURL['year']
         * $monthURL['month']
         * $monthURL['url']
         */
        $monthURL = $urlCheck->month($monthURL);
        /**
         * $countryURL['url']
         * $countryURL['id']
         */


        $cityURL = $urlCheck->city($cityURL);

        //$countryURL = $urlCheck->country($countryURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($monthURL['url'], $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($monthURL['url'], $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        //$countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $getParams = new GetParams();
        //$countryURL = $getParams->byCalendarMonths($countryURL, $monthURL['year'], $holidaysRange);

        //$holidaysData = $holidays->byCountryByMonth($countryURL['id'], $monthURL['year'], $monthURL['month'], $languageID);
        //$holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->byMonth($monthURL['url'] . '-01');
        ($dateToday = new \common\componentsV2\date\Date((new \DateTime())->format('Y-m-d')))->date()->year()->month();
        ($dateDataObj = new \common\componentsV2\date\Date($monthURL['url'] . '-01'))->date()->year()->month()->season();
        $calendars = new Calendars($dateToday->year->current);

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        //$country = new Country();
        //$countryData = $country->data($languageID, $countryURL['id']);

        $calendar = new Calendar();
        $calendarByMonth = $calendar->byMonth($monthURL);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        //$PDFCalendars = new PDFCalendars();
        //$PDFCalendarsData = $PDFCalendars->monthlyExists($monthURL, $language, $countryData['url']);

        $pageTexts = new PageTexts();
        //$pageTextsID = $pageTexts->defineIdByCalendarMonth($holidaysData, $PDFCalendarsData);
        Yii::$app->params['text'] = $main->text($textID, $languageID);


        //$pageTextsMessages = $pageTexts->messagesByCalendarMonth($dateData, count($holidaysData));
        //$pageTexts->updateByCalendarMonth($pageTextsMessages, $dateData, $countryData, count($holidaysData), $calendarNameOfMonths);

        //$breadCrumbs = new Breadcrumbs();
        //Yii::$app->params['breadcrumbs'] = $breadCrumbs->calendarMonths($dateDataObj, $countryURL['url'], $countryData);

        $time = new Time([
            'location' => [
                'cityID' => $cityURL['id'],
                'citiesByPopulation' => 1,
            ],
            'geoIP' => 1,
            'difference' => 1,
        ], $languageID);

        ($date = new \common\componentsV2\date\Date((
        $monthURL['year'] . '-' . $monthURL['month'] . '-01')))->year()->day()->week()->month();

        ($dateLocation = new \common\componentsV2\date\Date(($time->location->city->date->format('Y-m-d'))))->year()->day()->week()->month();


        $namaz = new Namaz([
            'time' => $time,
            'date' => $date,
            'languageID' => $languageID,
            'month' => 1,
        ]);

        Yii::$app->params['breadcrumbs'] = (new BreadcrumbsNamazCitiesCityMonths())->breadcrumbs($time, $date);


        return $this->render('namaz-cities-city-month-page.min.php', [

            'time' => $time,
            'date' => $date,
            'dateLocation' => $dateLocation,
            'namaz' => $namaz,
            'dateData' => $dateData,
            'calendarNameOfMonths' => $calendarNameOfMonths,
        ]);

    }

}
