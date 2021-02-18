<?php

namespace frontend\controllers\moon;

use common\components\calendar\Calendar;
use common\components\city\City;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use Yii;
use yii\web\Controller;


class MoonDaysController extends Controller
{


    public function actionMoonDayPage($dayNameURL, $dayURL)
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
        Yii::$app->params['canonical'] = $main->Canonical($yearURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($yearURL, $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $citiesDefaultID = Yii::$app->params['language']['current']['cities_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];


        ($date = new Date($check['date']))->date()->year()->month();
        ($dateToday = new Date((new \DateTime())->format('Y-m-d')))->date();

        $monthURL['year'] = $date->year->current;
        $monthURL['month'] = $date->month->current;

        $getParams = new GetParams();
        $getParams = $getParams->byCalendarMonthsMoon($citiesDefaultID);

        $city = new City();
        $cityData = $city->byMoonCalendar($languageID, $getParams['city']);

        $calendar = new Calendar();
        $calendarByMonth = $calendar->byMoonMonths($monthURL, $cityData);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByMoonDays($dayNameURL, $dayURL);
        //$pageTextsMessages = $pageTexts->messagesByCalendarYear($calendarChinese, $dateData, count($holidaysData));
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);
        $pageTexts->updateByMoonDays($dayNameURL, $date, $calendarByMonth['moonDay'][$date->current]);
        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        return $this->render('moon-day-page.min.php', [

            'date' => $date,
            'countryURL' => $countryURL,
            'dayNameURL' => $dayNameURL,
            'dateToday' => $dateToday,
            'calendarByMonth' => $calendarByMonth,
            'dayURL' => $dayURL,
            'holidaysRange' => $holidaysRange,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,


        ]);

    }

}