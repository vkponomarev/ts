<?php

namespace frontend\controllers;


use common\components\calendar\Calendar;
use common\components\customize\Customize;
use common\components\getParams\GetParams;
use common\components\holidays\Holidays;
use common\components\main\Main;
use common\components\year\Year;
use Mpdf\Mpdf;
use Mpdf\Tag\Img;
use tpmanc\imagick\Imagick;
use Yii;
use yii\web\Controller;
use mikehaertl\wkhtmlto\Pdf;


class CustomizeController extends Controller
{


    public function actionCustomizePage()
    {

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

        $year = new Year();
        $yearData = $year->data(0);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($yearData['full']);
        $calendarByWeek = $calendar->byWeek(1,2);
        $calendarByDays = $calendar->byDays(1,2);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

        $holidays = new Holidays();
        $holidaysData = $holidays->byCountryByYear(171,2020, 1);

        $getParams = new GetParams();
        $getParamsCustomize = $getParams->customize();

        $customize = new Customize();
        $customizeParams = $customize->params($getParamsCustomize['type'], $getParamsCustomize['orientation'], 1);


        $render = $this->render('@frontend/views/print/' . $customizeParams['page'] . '.min.php', [
            'yearData' => $yearData,
            'calendarByYear' => $calendarByYear,
            'calendarByWeek' => $calendarByWeek,
            'calendarByDays' => $calendarByDays,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,
            'holidaysData' => $holidaysData,
            'getParamsCustomize' => $getParamsCustomize,
        ]);

        /** Создание PDF из конкретной скомпилированной страницы с подключением к ней стилей*/
        $mpdf = new Mpdf(
            [

                'mode' => '+aCJK',
                //"allowCJKoverflow" => true,
                "autoScriptToLang" => true,
                //"allow_charset_conversion" => false,
                "autoLangToFont" => true,
                'orientation' => $getParamsCustomize['orientation'],
                'marginFooter' => 0
            ]


        );
        $mpdf->SetMargins(0,0,5);
        $mpdf->SetDisplayMode('fullpage');

        $stylesheet = file_get_contents('/var/www/timesles.loc/frontend/web/css/scss/main.min.css'); // external css
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($render);
        $mpdf->Output('/var/www/timesles.loc/frontend/web/customize/customize.pdf', \Mpdf\Output\Destination::FILE);

        /** Основной метод преобразовывания PDF в JPG*/
        $imagick = new \Imagick();
        $imagick->setResolution(100, 100);
        $imagick->readImage('/var/www/timesles.loc/frontend/web/customize/customize.pdf[0]');
        $imagick->setImageFormat('jpeg');
        $imagick->writeImages('/var/www/timesles.loc/frontend/web/customize/customize.jpg', false);

        /* Дополнительный метод преобразования PDF в JPG
        $pdfFile = escapeshellarg( "/var/www/timesles.loc/frontend/web/customize/customize.pdf[0]" );
        $jpgFile = escapeshellarg( "/var/www/timesles.loc/frontend/web/customize/customize.jpg" );
        exec( "convert -density 110 {$pdfFile} {$jpgFile}" );
        */

        $this->layout = "main";
        return $this->render('customize-page.min.php', [

            'yearData' => $yearData,
            'getParamsCustomize' => $getParamsCustomize,
            'calendarByWeek' => $calendarByWeek,
            'calendarByYear' => $calendarByYear,
            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);


    }


    public function actionPrintCalendarTest()
    {

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

        $year = new Year();
        $yearData = $year->data(0);

        $calendar = new Calendar();
        $calendarByYear = $calendar->byYear($yearData['full']);

        $calendarNameOfMonths = $calendar->nameOfMonths();
        $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();



        return $this->render('@frontend/views/print/calendar.php', [

            'yearData' => $yearData,
            'calendarByYear' => $calendarByYear,

            'calendarNameOfMonths' => $calendarNameOfMonths,
            'calendarNameOfDaysInWeek' => $calendarNameOfDaysInWeek,

        ]);


    }


}
