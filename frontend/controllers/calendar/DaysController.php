<?php

namespace frontend\controllers\calendar;

use common\components\breadcrumbs\Breadcrumbs;
use common\components\calendar\Calendar;
use common\components\city\City;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\calendars\Calendars;
use common\componentsV2\date\Date;
use common\componentsV2\zodiacs\Zodiacs;
use Yii;
use yii\web\Controller;


class DaysController extends Controller
{


    public function actionDayPage($dayNameURL, $dayURL)
    {

        $yearURL = 2021;
        $textID = '238'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл


        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $urlCheck = new UrlCheck();
        $check = $urlCheck->moonDays($dayNameURL, $dayURL, $holidaysRange);
        $urlCheck->holidaysYear($yearURL, $holidaysRange);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical();
        Yii::$app->params['alternate'] = $main->Alternate();
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $citiesDefaultID = Yii::$app->params['language']['current']['cities_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];


        ($date = new Date($check['date']))->date()->year()->month()->day()->week()->season();
        ($dateToday = new Date((new \DateTime())->format('Y-m-d')))->date()->year();

        $calendars = new Calendars($dateToday->year->current);

        $holidaysData = $holidays->byDay($date, $languageID, 0);

        $zodiacs = new Zodiacs();
        $zodiacs->zodiacByDay('2021-' . $date->month->current . '-' . $date->day->current);
        $zodiacs->zodiac($zodiacs->zodiacByDay->url);

        $monthURL['year'] = $date->year->current;
        $monthURL['month'] = $date->month->current;

        $city = new City();
        $cityData = $city->byMoonCalendar($languageID, $citiesDefaultID);

        $calendar = new Calendar();
        $calendarByMonth = $calendar->byMonth($monthURL);
        $calendarByMoonMonth = $calendar->byMoonMonths($monthURL, $cityData);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        //$calendarBySeasons = $calendar->bySeasons($yearURL, $seasonURL);

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByCalendarDays($dayNameURL, $dayURL);

        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);
        $pageTexts->updateByCalendarDays($date, $calendarNameOfMonths);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->calendarDays($date);

        return $this->render('day-page.min.php', [

            'date' => $date,
            'dayNameURL' => $dayNameURL,
            'holidaysData' => $holidaysData,
            'dateToday' => $dateToday,
            'zodiacs' => $zodiacs,
            'calendars' => $calendars,
            'calendarByMoonMonth' => $calendarByMoonMonth,
            'calendarByMonth' => $calendarByMonth,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);
    }
}
