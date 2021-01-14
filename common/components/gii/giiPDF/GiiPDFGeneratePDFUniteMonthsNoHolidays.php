<?php

namespace common\components\gii\giiPDF;


use common\components\gii\Gii;
use Mpdf\Mpdf;

/**
 * Объединение PDF календаря без праздников по месяцам в одни год
 * Class GiiPDFGeneratePDFUniteMonthsNoHolidays
 * @package common\components\gii\giiPDF
 */
class GiiPDFGeneratePDFUniteMonthsNoHolidays
{

    /**
     * Объединение PDF календаря без праздников по месяцам в одни год
     * @param $languageID
     * @param $countryData
     * @param $year
     * @param $languageURL
     * @param $orientation
     * @throws \ImagickException
     * @throws \Mpdf\MpdfException
     * @throws \setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException
     * @throws \setasign\Fpdi\PdfParser\PdfParserException
     * @throws \setasign\Fpdi\PdfParser\Type\PdfTypeException
     */
    function generate($languageID, $countryData, $year, $languageURL, $orientation)
    {


        $gii = new Gii();
        $PDFCalendarMonths = [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
            11 => 11,
            12 => 12,
        ];
        $seasons = [1 => 'winter', 2 => 'spring', 3 => 'summer', 4 => 'autumn'];

        $filePathNoHolidays = $gii->realPath() . '/frontend/web/calendars-pdf/no-holidays/months/';

        $doUnite = 1;

        foreach ($PDFCalendarMonths as $month) {
            $month = str_pad($month, 2, '0', STR_PAD_LEFT);
            $fileNameNoHolidays = 'calendar-months-' . $year . '-' . $month . '-' . $orientation . '-' . $languageURL;

            if (!file_exists($filePathNoHolidays . $fileNameNoHolidays . '.pdf')) {

                $doUnite = 0;

            }

        }

        if ($doUnite) {
            $i = 1;
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


            $outputFileNameNoHolidays = 'calendar-months-' . $year . '-' . $orientation . '-' . $languageURL;

            $PDFTitle['noHolidays'] = \Yii::t('app', 'PDF calendar for {year} by months', [
                'year' => $year,
            ]);

            $mpdf->SetTitle($PDFTitle['noHolidays']);


            if (!file_exists($filePathNoHolidays . $outputFileNameNoHolidays . '.pdf')) {

                foreach ($PDFCalendarMonths as $key => $month) {
                    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
                    $fileNameNoHolidays = 'calendar-months-' . $year . '-' . $month . '-' . $orientation . '-' . $languageURL;

                    for ($i = 1; $i <= $pagecount = $mpdf->SetSourceFile($filePathNoHolidays . $fileNameNoHolidays . '.pdf'); $i++) {
                        $mpdf->AddPage();
                        $tplID = $mpdf->ImportPage($i);
                        $mpdf->UseTemplate($tplID);
                    }
                }
                //$mpdf->Output();
                $mpdf->Output($filePathNoHolidays . $outputFileNameNoHolidays . '.pdf', \Mpdf\Output\Destination::FILE);

                /** Основной метод преобразовывания PDF в JPG*/
                $imagick = new \Imagick();
                $imagick->setResolution(100, 100);
                $imagick->readImage($filePathNoHolidays . $outputFileNameNoHolidays . '.pdf[0]');
                $imagick->setImageFormat('jpeg');
                $imagick->writeImages($filePathNoHolidays . $outputFileNameNoHolidays . '.jpg', false);

            }
        }
    }

}
