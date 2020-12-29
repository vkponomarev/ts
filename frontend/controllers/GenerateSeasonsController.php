<?php

namespace frontend\controllers;


use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\date\Date;
use common\components\getParams\GetParams;
use common\components\gii\Gii;
use common\components\gii\giiPDF\GiiPDF;
use common\components\holidays\Holidays;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\urlCheck\UrlCheck;
use Mpdf\Mpdf;
use Yii;
use yii\web\Controller;


/**
 * Генерация PDF календарей для сезонов года
 * Class GenerateSeasonsController
 * @package frontend\controllers
 */
class GenerateSeasonsController extends Controller
{
    /**
     * @param $languageID integer
     * @param $countryURL string
     * @param $yearURL integer
     * @param $orientation string
     * @param $language string
     * @param $pageName string
     * @param $seasonURL string
     * @throws \ImagickException
     * @throws \Mpdf\MpdfException
     * @throws \yii\db\Exception
     */
    public function actionGeneratePdf($languageID, $countryURL, $yearURL, $orientation, $language, $pageName, $seasonURL)
    {

        $params['languageID'] = $languageID;
        $params['countryURL'] = $countryURL;
        $params['year'] = $yearURL;
        $params['orientation'] = $orientation;
        $params['language'] = $language;
        $params['pageName'] = $pageName;
        $params['season'] = $seasonURL;

        Yii::$app->language = $params['language'];
        Yii::$app->formatter->locale = Yii::$app->language;
        $this->layout = "print";

        $url = false;
        $textID = '1'; // ID из таблицы pages
        $table = 'pages'; // К какой таблице отностся данная страница
        $mainUrl = false; // Основной урл

        $urlCheck = new UrlCheck();
        //$urlCheck->year($year);
        $countryURL = $urlCheck->country($countryURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $languageID = $params['languageID'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $getParams = new GetParams();
        $countryURL = $getParams->byCalendarSeasons($countryURL, $yearURL, $holidaysRange);
        $holidaysData = $holidays->byCountryBySeasonPDFGeneration($countryURL['id'], $yearURL, $languageID, $seasonURL);

        if (!$holidaysData && $yearURL >= $holidaysRange['start'] && $yearURL <= $holidaysRange['end']){
            $holidaysData = $holidays->byCountryBySeason($countryURL['id'], $yearURL, $languageID, $seasonURL);
        }

        $holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->bySeason($yearURL . '-01-01');

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['id']);

        $calendar = new Calendar();
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $calendarBySeasons = $calendar->bySeasons($yearURL, $seasonURL);

        $pageTexts = new PageTexts();
        $pageTextsMessages = $pageTexts->messagesByCalendarSeason($dateData, $seasonURL);

        if (!Yii::$app->request->get('title')){
            $getParamsCustomize['header'] = '';
        } else {
            $getParamsCustomize['header'] = 'Тайтл';
        }

        $PDFTitle['holidays'] = Yii::t('app', 'PDF calendar of holidays and weekends {season} of {year} {country_for}', [
            'year' => $dateData['year']['full'],
            'country_for' => $countryData['name_for'],
            'season' => $pageTextsMessages['seasonOn'],

        ]);

        $PDFTitle['noHolidays'] = Yii::t('app', 'PDF calendar {season} {year}', [
            'year' => $dateData['year']['full'],
            'season' => $pageTextsMessages['seasonOn']
        ]);

        $gii = New Gii();
        $fileName = 'calendar-seasons-' . $seasonURL . '-' . $yearURL . '-' . $orientation . '-' . $params['language'] . '-' . $countryData['url'];
        $fileNameNoHolidays = 'calendar-seasons-' . $seasonURL . '-' . $yearURL . '-' . $orientation . '-' . $params['language'];
        $filePath = $gii->realPath() . '/frontend/web/calendars-pdf/' . $countryData['url'] . '/seasons/';
        $filePathNoHolidays = $gii->realPath() . '/frontend/web/calendars-pdf/no-holidays/seasons/';
        $gii->generatePath($filePath);
        $gii->generatePath($filePathNoHolidays);

        $doPDF = 1;
        $doPDFNoHolidays = 1;

        if (!$holidaysData) {
            // Если нету праздников то значит календарь пустой и его можно записать один раз
            $doPDF = 0;
            if (file_exists($filePathNoHolidays . $fileNameNoHolidays . '.pdf')) {
                // Проверяем записан файл без праздников или еще нет
                $doPDFNoHolidays = 0;
            } else {
                // Если файла нет то мы его записывем.
                $doPDFNoHolidays = 1;
            }

        } else {

            $doPDF = 1;

            if (file_exists($filePathNoHolidays . $fileNameNoHolidays . '.pdf')) {
                $doPDFNoHolidays = 0;
            } else {
                $doPDFNoHolidays = 1;
            }

        }

        $giiPDF = new GiiPDF();

        if ($doPDF) {

            $render = $this->render('@frontend/views/print/' . $params['pageName'] . '.min.php', [
                'dateData' => $dateData,
                'countryData' => $countryData,
                'calendarBySeasons' => $calendarBySeasons,
                'calendarNameOfMonths' => $calendarNameOfMonths,
                'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                'holidaysData' => $holidaysData,
                'getParamsCustomize' => $getParamsCustomize,
                'seasonURL' => $seasonURL,
                'pageTextsMessages' => $pageTextsMessages,
            ]);

            $giiPDF->generatePDF($dateData, $countryData, $render, $filePath, $fileName, $orientation, 0, $PDFTitle);
        }


        if ($doPDFNoHolidays) {

            $render = $this->render('@frontend/views/print/' . $params['pageName'] . '-no-holidays.min.php', [
                'dateData' => $dateData,
                'countryData' => $countryData,
                'calendarBySeasons' => $calendarBySeasons,
                'calendarNameOfMonths' => $calendarNameOfMonths,
                'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                'holidaysData' => [0,0],
                'getParamsCustomize' => $getParamsCustomize,
                'seasonURL' => $seasonURL,
                'pageTextsMessages' => $pageTextsMessages,
            ]);

            $giiPDF->generatePDF($dateData, $countryData, $render, $filePathNoHolidays, $fileNameNoHolidays, $orientation, 1, $PDFTitle);
        }

    }

}
