<?php

namespace common\components\gii\giiPDF;


use common\components\gii\Gii;
use Mpdf\Mpdf;


class GiiPDFGeneratePDFUniteSeasons
{


    function generate($languageID, $countryURL, $year, $languageURL, $orientation)
    {

        $gii = new Gii();
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

        $seasons = [1 => 'winter', 2 => 'spring', 3 => 'summer', 4 => 'autumn'];

        $outputFileName = 'calendar-seasons-' . $year . '-' . $orientation . '-' . $languageURL . '-' . $countryURL;
        $filePath = $gii->realPath() . '/frontend/web/calendars-pdf/' . $countryURL . '/seasons/';

        $mpdf->SetTitle('PDF календраь с праздниками на 2020 год по сезонам года для России');

        foreach ($seasons as $key => $season) {

            $fileName = 'calendar-seasons-' . $season . '-' . $year . '-' . $orientation . '-' . $languageURL . '-' . $countryURL;

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
