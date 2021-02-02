<?php

namespace frontend\controllers\business;

use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\componentsV2\date\Date;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\holidaysTypes\HolidaysTypes;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\pdfCalendars\PDFCalendars;
use common\components\urlCheck\Url;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;


class BusinessYearsController extends Controller
{
    /**
     * @param $yearURL
     * @param $countryURL
     * @return string
     * @throws \yii\web\NotFoundHttpException
     * @throws \Exception
     */
    public function actionBusinessYearPage($yearURL, $countryURL)
    {


        $textID = '93'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл


        $holidays = new Holidays();
        $holidaysRange = $holidays->range();


        /*$url = new Url($yearURL);
        $url->yearURL($yearURL);
        $url->year;*/

        $urlCheck = new UrlCheck();
        $urlCheck->yearBusiness($yearURL, $holidaysRange);
        $countryURL = $urlCheck->country($countryURL);

        
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

        $getParams = new GetParams();
        $countryURL = $getParams->byCalendarYears($countryURL, $year, $holidaysRange);

        $holidaysData = $holidays->byCountryByYear($countryURL['id'], $year, $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        //$date = new Date();
        //$dateData = $date->yearBusiness($yearURL . '-01-01');

        ($date = new Date($yearURL . '-01-01'))->date()->year();

        $countries = new Countries();
        $countriesData = $countries->data($languageID);

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['id']);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYearBusiness($year, $holidaysData);
        $calendarChinese = $calendar->chineseByYear($year);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $pageTexts = new PageTexts();
        //$pageTextsID = $pageTexts->defineIdByCalendarYear($holidaysData, $calendarChinese);
        $pageTextsMessages = $pageTexts->messagesByCalendarYearBusiness($calendarChinese, $date, count($holidaysData));
        Yii::$app->params['text'] = $main->text($textID, $languageID);
        $pageTexts->updateByCalendarYearBusiness($pageTextsMessages, $date, $countryData, count($holidaysData));

        /*
                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);
        */

        $PDFCalendars = new PDFCalendars();
        $PDFCalendarsData = $PDFCalendars->businessExists($year, $language, $countryData['url']);



        return $this->render('business-year-page.min.php', [

            'date' => $date,
            'countriesData' => $countriesData,
            'countryData' => $countryData,
            'holidaysData' => $holidaysData,
            'holidaysRange' => $holidaysRange,
            'PDFCalendarsData' => $PDFCalendarsData,
            //'holidaysTypesData' => $holidaysTypesData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'countryURL' => $countryURL,

        ]);

    }

}
