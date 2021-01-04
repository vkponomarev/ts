<?php

namespace common\components\gii\giiPDF;


use common\components\gii\Gii;
use Mpdf\Mpdf;


class GiiPDFGeneratePDFUniteSeasonsNoHolidays
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

        $outputFileNameNoHolidays = 'calendar-seasons-' . $year . '-' . $orientation . '-' . $languageURL;
        $filePathNoHolidays = $gii->realPath() . '/frontend/web/calendars-pdf/no-holidays/seasons/';

        $mpdf->SetTitle('PDF Календраь на 2020 год по сезонам года');

        if (!file_exists($filePathNoHolidays . $outputFileNameNoHolidays . '.pdf')){

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
