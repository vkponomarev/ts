<?php

namespace frontend\controllers\moon;

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



class MoonYearsGardenerController extends Controller
{

    public function actionMoonYearGardenerPage($yearURL, $gardenerNameURL)
    {

        $textID = '148'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->yearMoon($yearURL);
        $urlCheck->moonGardenerName($gardenerNameURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($yearURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($yearURL, $mainUrl);
        Yii::$app->params['menu'] = $main->menu();


        $languageID = Yii::$app->params['language']['current']['id'];
        $citiesDefaultID = Yii::$app->params['language']['current']['cities_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $gardenerNames = new Moon();
        $gardenerNames = $gardenerNames->gardener();

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
        $pageTextsID = $pageTexts->defineIdByCalendarYearMoonGardener($gardenerNameURL);
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);

        $pageTextsMessages = $pageTexts->messagesByCalendarYearMoon($calendarChinese, $dateData);
        $pageTexts->updateByCalendarYearMoon($pageTextsMessages, $dateData);

        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->yearlyMoonExists($year, $language);

        return $this->render('moon-year-gardener-page.min.php', [

            'dateData' => $dateData,
            'cityData' => $cityData,
            'gardenerNames' => $gardenerNames,
            'gardenerName' => $gardenerNameURL,
            'PDFCalendarsData' => $PDFCalendarsData,
            //'holidaysTypesData' => $holidaysTypesData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
        ]);

    }

}
