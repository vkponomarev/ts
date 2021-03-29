<?php

namespace frontend\controllers;


use common\components\calendar\Calendar;
use common\components\city\City;
use common\components\date\Date;
use common\components\getParams\GetParams;
use common\components\gii\Gii;
use common\components\gii\giiPDF\GiiPDF;
use common\components\main\Main;
use Yii;
use yii\web\Controller;


class GenerateMoonYearsController extends Controller
{


    public function actionGeneratePdf($languageID, $countryID, $yearURL, $orientation, $language, $pageName, $test = 0)
    {

        //(new \common\components\dump\Dump())->printR('aewfw');die;



        Yii::$app->language = $language;
        Yii::$app->formatter->locale = Yii::$app->language;
        $this->layout = "print";

        $url = false;
        $textID = '97'; // ID из таблицы pages
        $table = 'pages'; // К какой таблице отностся данная страница
        $mainUrl = false; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $citiesDefaultID = Yii::$app->params['language']['current']['cities_id'];

        $date = new Date();
        $dateData = $date->data($yearURL . '-01-01');

        $city = new City();
        $cityData = $city->byMoonCalendar($languageID, $citiesDefaultID);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byMoonYears($yearURL, $cityData);
        $calendarChinese = $calendar->chineseByYear($yearURL);
        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        if (!Yii::$app->request->get('title')) {
            $getParamsCustomize['header'] = '';
        } else {
            $getParamsCustomize['header'] = 'Тайтл';
        }

        $PDFTitle['noHolidays'] = Yii::t('app', 'Year {year} PDF lunar calendar', [
            'year' => $dateData['year']['full'],
        ]);


        $gii = New Gii();
        //$fileName = 'calendar-moon-yearly-' . $yearURL . '-' . $orientation . '-' . $language . '-' . $countryData['url'];
        $fileNameNoHolidays = 'calendar-moon-yearly-' . $yearURL . '-' . $orientation . '-' . $language;
        //$filePath = $gii->realPath() . '/frontend/web/calendars-pdf/' . $countryData['url'] . '/moon-years/';
        $filePathNoHolidays = $gii->realPath() . '/frontend/web/calendars-pdf/no-holidays/moon-years/';
        //$gii->generatePath($filePath);
        $gii->generatePath($filePathNoHolidays);

        $doPDF = 1;
        $doPDFNoHolidays = 1;


        if (file_exists($filePathNoHolidays . $fileNameNoHolidays . '.pdf')) {
            // Проверяем записан файл без праздников или еще нет
            $doPDFNoHolidays = 0;
        } else {
            // Если файла нет то мы его записывем.
            $doPDFNoHolidays = 1;
        }

        $giiPDF = new GiiPDF();
        $doPDF = 1;
        /*if ($doPDF) {

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
        }*/


        if ($doPDFNoHolidays) {

            $render = $this->render('@frontend/views/print/calendar-moon-yearly/' . $pageName . '-no-holidays.min.php', [
                'dateData' => $dateData,
                'cityData' => $cityData,
                'calendarByYear' => $calendarByYear,
                'calendarNameOfMonths' => $calendarNameOfMonths,
                'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                'holidaysData' => [0, 0],
                'getParamsCustomize' => $getParamsCustomize,
            ]);

            $giiPDF->generatePDF($dateData, [0], $render, $filePathNoHolidays, $fileNameNoHolidays, $orientation, 1, $PDFTitle);
        }

    }

}
