<?php

namespace frontend\controllers;


use common\components\calendar\Calendar;
use common\components\country\Country;
use common\components\date\Date;
use common\components\gii\Gii;
use common\components\gii\giiPDF\GiiPDF;
use common\components\holidays\Holidays;
use common\components\main\Main;
use Mpdf\Mpdf;
use Yii;
use yii\web\Controller;



class GenerateBusinessYearsController extends Controller
{


    public function actionGeneratePdf($languageID, $countryID, $yearURL, $orientation, $language, $pageName, $test = 0)
    {

        Yii::$app->language = $language;
        Yii::$app->formatter->locale = Yii::$app->language;
        $this->layout = "print";

        $url = false;
        $textID = '1'; // ID из таблицы pages
        $table = 'pages'; // К какой таблице отностся данная страница
        $mainUrl = false; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();
        $holidaysData = $holidays->byCountryByYearPDFGeneration($countryID, $yearURL, $languageID);

        if (!$holidaysData && $yearURL >= $holidaysRange['start'] && $yearURL <= $holidaysRange['end']){
            $holidaysData = $holidays->byCountryByYear($countryID, $yearURL, $languageID);
        }
        $holidaysData = $holidays->arrayReplace($holidaysData);

        $date = new Date();
        $dateData = $date->yearBusiness($yearURL . '-01-01');

        $country = new Country();
        $countryData = $country->data($languageID, $countryID);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYearBusiness($yearURL, $holidaysData);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        if (!Yii::$app->request->get('title')){
            $getParamsCustomize['header'] = '';
        } else {
            $getParamsCustomize['header'] = 'Тайтл';
        }

        $PDFTitle['holidays'] = Yii::t('app', 'PDF calendar of business days with holidays in {year} {country_for}', [
            'year' => $dateData['year']['full'],
            'country_for' => $countryData['name_for'],
        ]);

        $PDFTitle['noHolidays'] = Yii::t('app', 'Year {year} PDF calendar', [
            'year' => $dateData['year']['full'],
        ]);


        $gii = New Gii();
        $fileName = 'calendar-business-yearly-' . $yearURL . '-' . $orientation . '-' . $language . '-' . $countryData['url'];
        $fileNameNoHolidays = 'calendar-business-yearly-' . $yearURL . '-' . $orientation . '-' . $language;
        $filePath = $gii->realPath() . '/frontend/web/calendars-pdf/' . $countryData['url'] . '/business-years/';
        $filePathNoHolidays = $gii->realPath() . '/frontend/web/calendars-pdf/no-holidays/business-years/';
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
        $doPDF = 1;
        if ($doPDF) {

            $render = $this->render('@frontend/views/print/calendar-business-yearly/' . $pageName . '.min.php', [
                'dateData' => $dateData,
                'countryData' => $countryData,
                'calendarByYear' => $calendarByYear,
                'calendarNameOfMonths' => $calendarNameOfMonths,
                'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                'holidaysData' => $holidaysData,
                'getParamsCustomize' => $getParamsCustomize,
            ]);
            if ($test){
                return $render;
            }
            $giiPDF->generatePDF($dateData, $countryData, $render, $filePath, $fileName, $orientation, 0, $PDFTitle);
        }


        /*if ($doPDFNoHolidays) {

            $render = $this->render('@frontend/views/print/' . $pageName . '-no-holidays.min.php', [
                'dateData' => $dateData,
                'countryData' => $countryData,
                'calendarByYear' => $calendarByYear,
                'calendarNameOfMonths' => $calendarNameOfMonths,
                'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                'holidaysData' => [0,0],
                'getParamsCustomize' => $getParamsCustomize,
            ]);

            $giiPDF->generatePDF($dateData, $countryData, $render, $filePathNoHolidays, $fileNameNoHolidays, $orientation, 1, $PDFTitle);
        }*/

    }

}
