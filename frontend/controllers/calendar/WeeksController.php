<?php

namespace frontend\controllers\calendar;

use common\components\breadcrumbs\Breadcrumbs;
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
use common\componentsV2\calendars\Calendars;
use Yii;
use yii\web\Controller;


class WeeksController extends Controller
{


    public function actionYearWeeksPage($yearURL)
    {


        $textID = '90'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->year($yearURL);
        //$weekURL = $urlCheck->week($weekURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical();
        Yii::$app->params['alternate'] = $main->Alternate();
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();

        $holidaysData = $holidays->byCountryByYear($countryURL['defaultID'], $year, $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->yearWeeks($yearURL . '-01-01');
        ($dateToday = new \common\componentsV2\date\Date((new \DateTime())->format('Y-m-d')))->date()->year();
        ($dateDataObj = new \common\componentsV2\date\Date($yearURL . '-01-01'))->date()->year()->month()->season();

        $calendars = new Calendars($dateToday->year->current);
        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['defaultID']);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($year);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTexts->updateByCalendarYearWeeks($dateData);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->calendarWeeksYears($dateDataObj);

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->yearlyWithWeeksExists($year, $language, $countryData['url']);
        //$PDFCalendarsData = 0;
        return $this->render('year-weeks-page.min.php', [

            'dateData' => $dateData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'PDFCalendarsData' => $PDFCalendarsData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'calendars' => $calendars,

        ]);

    }


    public function actionWeekPage($yearURL, $weekURL)
    {

        $textID = '91'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheck->year($yearURL);
        /**
         * 'url' => $week,
         * 'simple' => (int)$week,
         */
        $weekURL = $urlCheck->week($yearURL, $weekURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical();
        Yii::$app->params['alternate'] = $main->Alternate();
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();
        $holidaysData = $holidays->byCountryByYear($countryURL['defaultID'], $year, $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->yearWeeks($yearURL . '-01-01');

        ($date = new \common\componentsV2\date\Date($yearURL . '-01-01'))->date()->year()->month()->day()->week();
        ($dateToday = new \common\componentsV2\date\Date((new \DateTime())->format('Y-m-d')))->date()->year()->month()->day()->week();
        $calendars = new Calendars($dateToday->year->current);

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['defaultID']);

        $calendar = new Calendar();


        $calendarByWeek = $calendar->byMonthWeek($yearURL, $weekURL['url'], $dateData['week']['count']);
        //(new \common\components\dump\Dump())->printR($calendarByWeek);die;


        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTexts->updateByCalendarWeek($dateData, $calendarByWeek, $weekURL);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->calendarWeeksWeek($date, $weekURL);

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->weeklyExists($year, $language, $weekURL['url']);
        $PDFCalendarsDataYearly = $PDFCalendars->yearlyWithWeeksExists($yearURL, $language, $weekURL['url']);
        $PDFCalendarsDataMerged = array_merge_recursive($PDFCalendarsData, $PDFCalendarsDataYearly);

        $isOn = 0;
        foreach ($PDFCalendarsDataMerged['exists'] as $one){
            if ($one==1){
                $PDFCalendarsDataMerged['exists'] = 1;
                $isOn = 1;
            } else {
                if ($isOn == 0){
                    $PDFCalendarsDataMerged['exists'] = 0;
                }
            }
        }

        return $this->render('week-page.min.php', [

            'dateData' => $dateData,
            'date' => $date,
            'dateToday' => $dateToday,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'PDFCalendarsData' => $PDFCalendarsDataMerged,
            'calendarByWeek' => $calendarByWeek,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'weekURL' => $weekURL,
            'calendars' => $calendars,
        ]);

    }

}
