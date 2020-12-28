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


/**
 * Контроллер предназначенный для генерации PDF календарей
 * Class GenerateController
 * @package frontend\controllers
 */
class GenerateController extends Controller
{

    /**
     * Генерирует PDF календраь на год с праздниками и без, горизонтальный и вертикальный.
     * @param $languageID integer ID текущего языка.
     * @param $countryID integer ID страны.
     * @param $year integer Год.
     * @param $orientation string Ориентация календаря.
     * @param $language string Двух буквенное обозначение языка.
     * @param $pageName string Наименование страницы view календаря из папки frontend/views/print/ без -no-holidays.
     * @throws \ImagickException
     * @throws \Mpdf\MpdfException
     */
    public function actionGeneratePdf($languageID, $countryID, $year, $orientation, $language, $pageName)
    {

        $params['languageID'] = $languageID;
        $params['countryID'] = $countryID;
        $params['year'] = $year;
        $params['orientation'] = $orientation;
        $params['language'] = $language;
        $params['pageName'] = $pageName;

        Yii::$app->language = $params['language'];
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

        $languageID = $params['languageID'];
        $countryID = $params['countryID'];
        $year = $params['year'];
        $orientation = $params['orientation'];

        $date = new Date();
        $dateData = $date->data($year . '-01-01');

        $country = new Country();
        $countryData = $country->data($languageID, $countryID);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($dateData['year']['full']);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $holidays = new Holidays();
        $holidaysData = $holidays->byCountryByYearPDFGeneration($countryData['id'], $year, $languageID);

        if (!Yii::$app->request->get('title')){
            $getParamsCustomize['header'] = '';
        } else {
            $getParamsCustomize['header'] = 'Тайтл';
        }

        $gii = New Gii();
        $fileName = 'calendar-yearly-' . $year . '-' . $orientation . '-' . $params['language'] . '-' . $countryData['url'];
        $fileNameNoHolidays = 'calendar-yearly-' . $year . '-' . $orientation . '-' . $params['language'];
        $filePath = $gii->realPath() . '/frontend/web/calendars-pdf/' . $countryData['url'] . '/';
        $filePathNoHolidays = $gii->realPath() . '/frontend/web/calendars-pdf/no-holidays/';
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
                'calendarByYear' => $calendarByYear,
                'calendarNameOfMonths' => $calendarNameOfMonths,
                'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                'holidaysData' => $holidaysData,
                'getParamsCustomize' => $getParamsCustomize,
            ]);

            $giiPDF->generatePDF($dateData, $countryData, $render, $filePath, $fileName, $orientation, 0);
        }


        if ($doPDFNoHolidays) {

            $render = $this->render('@frontend/views/print/' . $params['pageName'] . '-no-holidays.min.php', [
                'dateData' => $dateData,
                'countryData' => $countryData,
                'calendarByYear' => $calendarByYear,
                'calendarNameOfMonths' => $calendarNameOfMonths,
                'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
                'holidaysData' => [0,0],
                'getParamsCustomize' => $getParamsCustomize,
            ]);

            $giiPDF->generatePDF($dateData, $countryData, $render, $filePathNoHolidays, $fileNameNoHolidays, $orientation, 1);
        }

    }

}
