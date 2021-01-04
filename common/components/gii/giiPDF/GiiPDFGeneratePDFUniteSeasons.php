<?php

namespace common\components\gii\giiPDF;


use common\components\gii\Gii;
use Mpdf\Mpdf;

/**
 * Объединение PDF календарей с праздниками по сезонм в один каледарь
 * Class GiiPDFGeneratePDFUniteSeasons
 * @package common\components\gii\giiPDF
 */
class GiiPDFGeneratePDFUniteSeasons
{

    /**
     * Объединение PDF календарей с праздниками по сезонм в один каледарь
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


        $seasons = [1 => 'winter', 2 => 'spring', 3 => 'summer', 4 => 'autumn'];

        $gii = new Gii();
        $filePath = $gii->realPath() . '/frontend/web/calendars-pdf/' . $countryData['url'] . '/seasons/';

        $doUnite = 1;

        foreach ($seasons as $season) {

            $fileName = 'calendar-seasons-' . $season . '-' . $year . '-' . $orientation . '-' . $languageURL . '-' . $countryData['url'];

            if (!file_exists($filePath . $fileName . '.pdf')) {

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


            $outputFileName = 'calendar-seasons-' . $year . '-' . $orientation . '-' . $languageURL . '-' . $countryData['url'];

            $PDFTitle['holidays'] = \Yii::t('app', 'PDF calendar of holidays and weekends for {year} by seasons {country_for}', [
                'year' => $year,
                'country_for' => $countryData['name_for'],
            ]);

            $mpdf->SetTitle($PDFTitle['holidays']);

            foreach ($seasons as $key => $season) {

                $fileName = 'calendar-seasons-' . $season . '-' . $year . '-' . $orientation . '-' . $languageURL . '-' . $countryData['url'];

                for ($i = 1; $i <= $pagecount = $mpdf->SetSourceFile($filePath . $fileName . '.pdf'); $i++) {
                    $mpdf->AddPage();
                    $tplID = $mpdf->ImportPage($i);
                    $mpdf->UseTemplate($tplID);
                }
            }


            $mpdf->Output($filePath . $outputFileName . '.pdf', \Mpdf\Output\Destination::FILE);

            /** Основной метод преобразовывания PDF в JPG*/
            $imagick = new \Imagick();
            $imagick->setResolution(100, 100);
            $imagick->readImage($filePath . $outputFileName . '.pdf[0]');
            $imagick->setImageFormat('jpeg');
            $imagick->writeImages($filePath . $outputFileName . '.jpg', false);
        }

    }

}
