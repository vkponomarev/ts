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



class GenerateWeeksController extends Controller
{

    public function actionGeneratePdf($languageID, $countryID, $yearURL, $weekURL, $orientation, $language, $pageName)
    {

        Yii::$app->language = $language;
        Yii::$app->formatter->locale = Yii::$app->language;
        $this->layout = "print";

        $url = false;
        $textID = '1'; // ID из таблицы pages
        $table = 'pages'; // К какой таблице отностся данная страница
        $mainUrl = false; // Основной урл

        $urlCheck = new UrlCheck();
        $weekURL = $urlCheck->week($yearURL, $weekURL);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);


        $languageID = Yii::$app->params['language']['current']['id'];
        $countryURL['defaultID'] = Yii::$app->params['language']['current']['countries_id'];
        $year = $yearURL;
        $language = Yii::$app->params['language']['current']['url'];

        $holidays = new Holidays();
        $holidaysData = $holidays->byCountryByYear($countryURL['defaultID'], $year, $languageID);
        $holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->yearWeeks($yearURL . '-01-01');

        $country = new Country();
        $countryData = $country->data($languageID, $countryURL['defaultID']);

        $calendar = new Calendar();
        $calendarByWeek = $calendar->byWeek($yearURL, $weekURL['url'], 0);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        if (!Yii::$app->request->get('title')){
            $getParamsCustomize['header'] = '';
        } else {
            $getParamsCustomize['header'] = 'Тайтл';
        }

        $PDFTitle['holidays'] = Yii::t('app', 'PDF Calendar of holidays and weekends in {year} {country_for}', [
            'year' => $dateData['year']['full'],
            'country_for' => $countryData['name_for'],
        ]);

        $PDFTitle['noHolidays'] = Yii::t('app', 'PDF weekly for the {week} week of {year}', [
            'year' => $dateData['year']['full'],
            'week' => $weekURL['url'],
        ]);


        $gii = New Gii();
        $fileName = 'calendar-weekly-' . $yearURL . '-' . $weekURL['url'] . '-' . $orientation . '-' . $language . '-' . $countryData['url'];
        $fileNameNoHolidays = 'calendar-weekly-' . $yearURL . '-' . $weekURL['url'] . '-' . $orientation . '-' . $language;
        $filePath = $gii->realPath() . '/frontend/web/calendars-pdf/' . $countryData['url'] . '/weeks/';
        $filePathNoHolidays = $gii->realPath() . '/frontend/web/calendars-pdf/no-holidays/weeks/';
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

        /*if ($doPDF) {

            $render = $this->render('@frontend/views/print/calendar-yearly/' . $pageName . '.min.php', [
                'dateData' => $dateData,
                'countryData' => $countryData,
                'calendarByYear' => $calendarByYear,
                'calendarNameOfMonths' => $calendarNameOfMonths,
                'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                'holidaysData' => $holidaysData,
                'getParamsCustomize' => $getParamsCustomize,
            ]);

            $giiPDF->generatePDF($dateData, $countryData, $render, $filePath, $fileName, $orientation, 0, $PDFTitle);
        }*/


        if ($doPDFNoHolidays) {

            $render = $this->render('@frontend/views/print/calendar-weekly/' . $pageName . '-no-holidays.min.php', [
                'dateData' => $dateData,
                'countryData' => $countryData,
                'calendarByWeek' => $calendarByWeek,
                'calendarNameOfMonths' => $calendarNameOfMonths,
                'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                'holidaysData' => [0,0],
                'getParamsCustomize' => $getParamsCustomize,
                'weekURL' => $weekURL,
            ]);

            $giiPDF->generatePDF($dateData, $countryData, $render, $filePathNoHolidays, $fileNameNoHolidays, $orientation, 1, $PDFTitle);
        }

    }
}
