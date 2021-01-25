<?php

namespace frontend\controllers;

use common\components\calendar\Calendar;
use common\components\city\City;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\date\Date;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\holidaysTypes\HolidaysTypes;
use common\components\main\Main;
use common\components\moon\Moon;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;



class MoonYearsGoodController extends Controller
{

    public function actionMoonYearGoodPage($yearURL, $dayNameURL)
    {


        $textID = '97'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->yearMoon($yearURL);
        $urlCheck->moonGoodDay($dayNameURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($yearURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($yearURL, $mainUrl);
        Yii::$app->params['menu'] = $main->menu();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);

        $languageID = Yii::$app->params['language']['current']['id'];
        $citiesDefaultID = Yii::$app->params['language']['current']['cities_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $goodDays = new Moon();
        $goodDays = $goodDays->days();

        $getParams = new GetParams();
        $getParams = $getParams->byCalendarYearsMoon($citiesDefaultID);

        $date = new Date();
        $dateData = $date->data($yearURL . '-01-01');

        $city = new City();
        $cityData = $city->byMoonCalendar($languageID, $getParams['city']);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byMoonYears($year, $cityData);
        $calendarChinese = $calendar->chineseByYear($year);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTextsMessages = $pageTexts->messagesByCalendarYearMoon($calendarChinese, $dateData);
        $pageTexts->updateByCalendarYearMoon($pageTextsMessages, $dateData);

        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->yearlyMoonExists($year, $language);

        if ($dayNameURL ==''){
            $dayNameURL = 'daysByRatingCount';
        }


        return $this->render('moon-year-good-page.min.php', [

            'dateData' => $dateData,
            'cityData' => $cityData,
            'goodDays' => $goodDays,
            'dayNameURL' => $dayNameURL,
            'PDFCalendarsData' => $PDFCalendarsData,
            //'holidaysTypesData' => $holidaysTypesData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
        ]);

    }

}