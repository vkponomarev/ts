<?php

namespace frontend\controllers;


use common\components\calendar\Calendar;
use common\components\country\Country;
use common\components\date\Date;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\main\Main;
use Mpdf\Mpdf;
use Yii;
use yii\web\Controller;


/**
 * Main controller
 * pageText($currentPage,$pageUsingKeys)
 *
 *
 *
 *
 */
class PrintController extends Controller
{


    public function actionPrintCalendar()
    {

        $getParams = new GetParams();
        $getParamsByPrintTest = $getParams->byPrintTest();
        Yii::$app->language = 'en';
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
        Yii::$app->params['menu'] = $main->menu();
        $date = new Date();
        $dateData = $date->data(1950);

        $country = new Country();
        $countryData = $country->byPDFGeneration(Yii::$app->params['language']['current']['id'], 170);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($dateData['year']['full']);
        //$calendarByWeek = $calendar->byWeek(1, 2);
        //$calendarByDays = $calendar->byDays(1, 2);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $holidays = new Holidays();
        $holidaysData = $holidays->byCountryByYearPDFGeneration(171, 1950, 1);

        $getParamsCustomize['header'] = '';
        //$render = $this->render('@frontend/views/print/calendar-yearly-landscape-one.min.php', [

        $render = $this->render('@frontend/views/print/' . $getParamsByPrintTest['page'], [
        //$render = Yii::$app->view->render('@frontend/views/print/' . $getParamsByPrintTest['page'], [
            'dateData' => $dateData,
            'countryData' => $countryData,
            'calendarByYear' => $calendarByYear,
            //'calendarByWeek' => $calendarByWeek,
            //'calendarByDays' => $calendarByDays,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'holidaysData' => $holidaysData,

        ]);

        $mpdf = new Mpdf(
            [
                'mode' => '+aCJK',
                //"allowCJKoverflow" => true,
                "autoScriptToLang" => true,
                //"allow_charset_conversion" => false,
                "autoLangToFont" => true,
                'orientation' => $getParamsByPrintTest['orientation'],
                'marginFooter' => 0

            ]
        );
        $mpdf->SetMargins(0, 0, 5);
        $mpdf->SetDisplayMode('fullpage');
        //$mpdf->useAdobeCJK = true;


        $stylesheet = file_get_contents('/var/www/timesles.loc/frontend/web/css/scss/main.min.css'); // external css
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($render);
        //$mpdf->WriteHTML( 'Hello World 中文');
        //$mpdf->Output('/var/www/timesles.loc/frontend/web/tests2356.pdf', \Mpdf\Output\Destination::FILE);
        $mpdf->Output();
        //return 0;
        /*return $this->render('@frontend/views/main-page/index.min.php', [

            'yearData' => $yearData,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);*/


    }


    public function actionPrintCalendarTest()
    {


        $getParams = new GetParams();
        $getParamsByPrintTest = $getParams->byPrintTest();
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
        Yii::$app->params['menu'] = $main->menu();

        $date = new Date();
        $dateData = $date->data(2020);

        $country = new Country();
        $countryData = $country->byPDFGeneration(Yii::$app->params['language']['current']['id'], 171);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($dateData['year']['full']);
        $calendarByWeek = $calendar->byWeek(1, 2);
        $calendarByDays = $calendar->byDays(1, 2);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $holidays = new Holidays();
        $holidaysData = $holidays->byCountryByYearPDFGeneration(171, 2020, 1);
        //(new \common\components\dump\Dump())->printR($holidaysData);
        //return $this->render('@frontend/views/print/calendar-yearly-landscape-one.min.php', [
        return $this->render('@frontend/views/print/' . $getParamsByPrintTest['page'], [

            'dateData' => $dateData,
            'countryData' => $countryData,
            'calendarByYear' => $calendarByYear,
            'calendarByWeek' => $calendarByWeek,
            'calendarByDays' => $calendarByDays,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'holidaysData' => $holidaysData,


        ]);


    }


}
