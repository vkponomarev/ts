<?php

namespace common\components\gii\giiPDF;


use common\components\gii\Gii;
use Mpdf\Mpdf;


class GiiPDFGeneratePDFUniteMonths
{

    function generate($languageID, $countryData, $year, $languageURL, $orientation)
    {

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

        $gii = new Gii();
        $filePath = $gii->realPath() . '/frontend/web/calendars-pdf/' . $countryData['url'] . '/months/';

        $doUnite = 1;

        foreach ($PDFCalendarMonths as $month) {
            $month = str_pad($month, 2, '0', STR_PAD_LEFT);
            $fileName = 'calendar-months-' . $year . '-' . $month . '-' . $orientation . '-' . $languageURL . '-' . $countryData['url'];

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


            $outputFileName = 'calendar-months-' . $year . '-' . $orientation . '-' . $languageURL . '-' . $countryData['url'];

            $PDFTitle['holidays'] = \Yii::t('app', 'PDF calendar of holidays and weekends for {year} by months {country_for}', [
                'year' => $year,
                'country_for' => $countryData['name_for'],
            ]);

            $mpdf->SetTitle($PDFTitle['holidays']);

            foreach ($PDFCalendarMonths as $key => $month) {
                $month = str_pad($month, 2, '0', STR_PAD_LEFT);
                $fileName = 'calendar-months-' . $year . '-' . $month . '-' . $orientation . '-' . $languageURL . '-' . $countryData['url'];

                for ($i = 1; $i <= $pagecount = $mpdf->SetSourceFile($filePath . $fileName . '.pdf'); $i++) {
                    $mpdf->AddPage();
                    $tplID = $mpdf->ImportPage($i);
                    $mpdf->UseTemplate($tplID);
                }
            }

            //$mpdf->Output();
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
