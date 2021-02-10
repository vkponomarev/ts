<?php

namespace frontend\controllers\holidays;

use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\getParams\GetParams;
use common\components\holiday\Holiday;
use common\components\holidays\Holidays;
use common\components\holidaysTypes\HolidaysTypes;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\UrlCheck;
use common\componentsV2\date\Date;
use Yii;
use yii\web\Controller;



class HolidaysHolidayController extends Controller
{


    public function actionHolidaysHolidayPage($holidayNameURL, $countryURL)
    {


        $textID = '238'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $urlCheck = new UrlCheck();
        $url = $urlCheck->holidaysName($holidayNameURL);
        $countryURL = $urlCheck->country($countryURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['canonical'] = $main->Canonical($holidayNameURL, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($holidayNameURL, $mainUrl);
        Yii::$app->params['menu'] = $main->menu();

        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $language = Yii::$app->params['language']['current']['url'];


        ($date = new Date((new \DateTime())->format('Y-m-d')))->date()->year()->month();

        $getParams = new GetParams();

        //$countryURL = $getParams->byCalendarYears($countryURL, $year, $holidaysRange);

        $holiday = new Holiday();
        $holidayData = $holiday->byID($url['id'], $languageID);

        $holidaysData = $holidays->byHolidayID($date, $languageID, $countryURL['id'], $holidayData['id']);

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['id']);

        $calendar = new Calendar();
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        $pageTextsID = $pageTexts->defineIdByHolidaysHoliday($countryURL['id']);
        //$pageTextsMessages = $pageTexts->messagesByCalendarYear($calendarChinese, $dateData, count($holidaysData));
        Yii::$app->params['text'] = $main->text($pageTextsID, $languageID);
        $pageTexts->updateByHolidaysWorldHoliday($date, $countryData, $holidayData);
        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */
        return $this->render('holidays-holiday-page.min.php', [

            'date' => $date,
            'countriesData' => $countriesData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'holidayData' => $holidayData,
            'countryURL' => $countryURL,
            'holidaysRange' => $holidaysRange,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);

    }

}
