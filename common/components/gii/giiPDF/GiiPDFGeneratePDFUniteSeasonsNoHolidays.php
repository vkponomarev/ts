<?php

namespace common\components\gii\giiPDF;


use common\components\gii\Gii;
use Mpdf\Mpdf;

/**
 * Объединение PDF календарей без праздников по сезонм в один каледарь
 * Class GiiPDFGeneratePDFUniteSeasonsNoHolidays
 * @package common\components\gii\giiPDF
 */
class GiiPDFGeneratePDFUniteSeasonsNoHolidays
{

    /**
     * Объединение PDF календарей без праздников по сезонм в один каледарь
     * @param $languageID
     * @param $countryURL
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

        $seasons = [1 => 'winter', 2 => 'spring', 3 => 'summer', 4 => 'autumn'];
        $filePathNoHolidays = $gii->realPath() . '/frontend/web/calendars-pdf/no-holidays/seasons/';

        $doUnite = 1;

        foreach ($seasons as $season) {

            $fileNameNoHolidays = 'calendar-seasons-' . $season . '-' . $year . '-' . $orientation . '-' . $languageURL;

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


            $outputFileNameNoHolidays = 'calendar-seasons-' . $year . '-' . $orientation . '-' . $languageURL;

            $PDFTitle['noHolidays'] = \Yii::t('app', 'PDF calendar for {year} by seasons', [
                'year' => $year,
            ]);

            $mpdf->SetTitle($PDFTitle['noHolidays']);


            if (!file_exists($filePathNoHolidays . $outputFileNameNoHolidays . '.pdf')) {

                foreach ($seasons as $key => $season) {

                    $fileNameNoHolidays = 'calendar-seasons-' . $season . '-' . $year . '-' . $orientation . '-' . $languageURL;

                    for ($i = 1; $i <= $pagecount = $mpdf->SetSourceFile($filePathNoHolidays . $fileNameNoHolidays . '.pdf'); $i++) {
                        $mpdf->AddPage();
                        $tplID = $mpdf->ImportPage($i);
                        $mpdf->UseTemplate($tplID);
                    }
                }

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
