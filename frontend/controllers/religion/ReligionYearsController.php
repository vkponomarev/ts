<?php

namespace frontend\controllers\religion;

use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\holidaysTypes\HolidaysTypes;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\calendars\Calendars;
use common\componentsV2\date\Date;
use Yii;
use yii\web\Controller;



class ReligionYearsController extends Controller
{


    public function actionReligionYearPage($yearURL, $religionURL)
    {

        $textID = '74'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $urlCheck = new UrlCheck();
        $urlCheck->yearReligion($yearURL, $holidaysRange);
        $urlCheck->religion($religionURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($yearURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($yearURL, $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $getParams = new GetParams();

        $holidaysData = $holidays->byReligion($year, $languageID, $religionURL);

        $holidaysData = $holidays->arrayReplace($holidaysData);

        ($date = new Date($yearURL . '-01-01'))->date()->year();

        ($dateToday = new \common\componentsV2\date\Date((new \DateTime())->format('Y-m-d')))->date()->year();
        $calendars = new Calendars($dateToday->year->current);

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($date->year->current);
        $calendarChinese = $calendar->chineseByYear($date->year->current);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByCalendarYearReligion($religionURL);
        $pageTextsMessages = $pageTexts->messagesByCalendarYearReligion($calendarChinese, $date, count($holidaysData));
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);
        $pageTexts->updateByCalendarYearReligion($pageTextsMessages, $date, count($holidaysData));
        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        //$PDFCalendars = new PDFCalendars();
        //$PDFCalendarsData = $PDFCalendars->yearlyExists($year, $language, $countryData['url']);


        return $this->render('religion-year-page.min.php', [

            'date' => $date,
            'dates' => [],
            'religion' => $religionURL,
            'holidaysData' => $holidaysData,
            'holidaysRange' => $holidaysRange,
            //'PDFCalendarsData' => $PDFCalendarsData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'calendars' => $calendars,
        ]);

    }

}
