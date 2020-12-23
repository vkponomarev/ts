<?php

namespace common\components\gii\giiPDF;


use common\components\calendar\Calendar;
use common\components\countries\Countries;
use common\components\country\Country;
use common\components\date\Date;
use common\components\gii\Gii;
use common\components\holidays\Holidays;
use common\components\main\Main;

use Mpdf\Mpdf;
use Yii;

/**
 * Class GiiPDFGeneratePDFCalendarYearly
 * @package common\components\gii\giiPDF
 * Класс отвечающий за генерацию PDF календаря на год
 */
class __GiiPDFGeneratePDFCalendarYearly
{

    /**
     * @param $languagesData
     * @throws \ImagickException
     * @throws \Mpdf\MpdfException
     *
     */
    function generate($languagesData)
    {
        set_time_limit(500000);

        $countries = new Countries();
        $countriesByPDFGeneration = $countries->byPDFGeneration();


        $country = new Country();


        $PDFCalendarYearlyPages = [
            'P' => 'calendar-yearly-portrait-one',
            'L' => 'calendar-yearly-landscape-one',
        ];

        $PDFCalendarYearlyOrientation = [
            1 => 'P',
            2 => 'L',
        ];

        $count = 0;
        foreach (range(1950, 1951) as $eachYear) {


            foreach ($languagesData as $language) {

                $count++;

                //if ($count <= 11) {continue;};
                Yii::$app->language = $language['lang_lang'];
                Yii::$app->sourceLanguage = $language['url'];
                //(new \common\components\dump\Dump())->printR($language);
                //die;
                $bigData = new \common\components\bigData\BigData();
                $bigData->saveData($count, 'work');

                foreach ($countriesByPDFGeneration as $eachCountry) {


                    $countryData = $country->byPDFGeneration($language['id'], $eachCountry['id']);


                    //$this->layout = "print";
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

                    $languageID = $language['id'];
                    $countryID = $eachCountry['id'];
                    $year = $eachYear;

                    //$languageID = 2;
                    //$countryID = 171;
                    //$year = 2020;

                    $date = new Date();
                    $dateData = $date->data($year . '-01-01');

                    $countries = new Countries();
                    $countriesData = $countries->data($languageID);

                    $country = new Country();
                    $countryData = $country->data($languageID, $countryID);

                    $calendar = new Calendar();
                    $calendarByYear = $calendar->byYear($dateData['year']['full']);

                    $calendarNameOfMonths = $calendar->nameOfMonths();
                    $calendarNameOfDaysInWeek = $calendar->nameOfDaysInWeek();

                    $holidays = new Holidays();
                    $holidaysData = $holidays->byCountryByYearPDFGeneration($countryData['id'], $year, $languageID);

                    $getParamsCustomize['header'] = '';


                    //Yii::$app->view->registerCssFile("/var/www/timesles.loc/frontend/web/css/scss/main.css");
                    //Yii::$app->view->registerCss('/var/www/timesles.loc/frontend/web/css/scss/main.css');

                    //$render =  Yii::$app->view->render('@frontend/views/print/' . $PDFCalendarYearlyPages[1] . $isHolidays . '.min.php', [
                    //$render = Yii::$app->controller->render
                    //Yii::$app->view->renderDynamic()
                    //Yii::$app->controller->layout='print';
                    //Yii::$app->controller->renderPartial($view)
                    //Yii::$app->controller->renderAjax($view)
                    //Yii::$app->controller->renderContent($content)


                    foreach ($PDFCalendarYearlyOrientation as $orientation) {

                        $gii = New Gii();
                        $fileName = 'calendar-yearly-' . $year . '-' . $orientation . '-' . $language['url'] . '-' . $countryData['url'];
                        $fileNameNoHolidays = 'calendar-yearly-' . $year . '-' . $orientation . '-' . $language['url'];
                        $filePath = $gii->realPath() . '/frontend/web/calendars-pdf/' . $countryData['url'] . '/';
                        $filePathNoHolidays = $gii->realPath() . '/frontend/web/calendars-pdf/no-holidays/';
                        $gii->generatePath($filePath);
                        $gii->generatePath($filePathNoHolidays);

                        if (!$holidaysData) {
                            // Если нету праздников то значит календарь пустой и его можно записать один раз


                            $isHolidays = '-no-holidays';

                            if (file_exists($filePathNoHolidays . $fileNameNoHolidays . '.pdf')){
                                // Проверяем записан файл без праздников или еще нет
                                // Если записан то мы завершаем цикл без перезаписи календрая.
                                continue;

                            } else {
                                // Если файла нет то мы его записывем.
                                // Присваивая значения с отсутствующими праздниками к значениям которые учавствуют в записи файла.
                                $fileName = $fileNameNoHolidays;
                                $filePath = $filePathNoHolidays;
                            }

                        } else {

                            $isHolidays = '';

                        }
                        //Yii::$app->view->renderAjax
                        //Yii::$app->view->render
                        //Yii::$app->view->registerCss($css)
                        //Yii::$app->view->registerCssFile($url)
                        //Yii::$app->view->renderPhpFile($_file_)

                        $render = Yii::$app->view->render('@frontend/views/print/' . $PDFCalendarYearlyPages[$orientation] . $isHolidays . '.min.php', [
                            'dateData' => $dateData,
                            'countryData' => $countryData,
                            'calendarByYear' => $calendarByYear,
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
                                'orientation' => $orientation,
                                'marginFooter' => 0
                            ]
                        );

                        $mpdf->SetMargins(0, 0, 5);
                        $mpdf->SetDisplayMode('fullpage');

                        $stylesheet = file_get_contents('/var/www/timesles.loc/frontend/web/css/scss/main.css'); // external css
                        $mpdf->WriteHTML($stylesheet, 1);
                        $mpdf->WriteHTML($render);
                        $mpdf->Output($filePath . $fileName . '.pdf', \Mpdf\Output\Destination::FILE);
                        //$mpdf->Output();


                        /** Основной метод преобразовывания PDF в JPG*/
                        $imagick = new \Imagick();
                        $imagick->setResolution(100, 100);
                        $imagick->readImage($filePath . $fileName . '.pdf');
                        $imagick->setImageFormat('jpeg');
                        $imagick->writeImages($filePath . $fileName . '.jpg', false);

                        /* Дополнительный метод преобразования PDF в JPG
                        $pdfFile = escapeshellarg( "/var/www/timesles.loc/frontend/web/customize/customize.pdf[0]" );
                        $jpgFile = escapeshellarg( "/var/www/timesles.loc/frontend/web/customize/customize.jpg" );
                        exec( "convert -density 110 {$pdfFile} {$jpgFile}" );
                        */

                    }
                }
            }
        }
    }

}
