<?php

namespace common\components\gii\giiPDF;


use common\components\bigData\BigData;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\gii\Gii;
use common\components\gii\view\View;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\urlCheck\UrlCheck;
use Mpdf\Mpdf;
use Yii;
use yii\web\Controller;

/**
 * Генерация PDF файла и картинки предпросмотра.
 * Class GiiPDFGeneratePDF
 * @package common\components\gii\giiPDF
 */
class GiiPDFGeneratePDF
{

    /**
     * Здесь проиходит непосредственная генерация PDF файла и файла картинки этого PDF
     * @param $dateData
     * @param $countryData
     * @param $render
     * @param $filePath
     * @param $fileName
     * @param $orientation
     * @param $noHolidays
     * @param $PDFTitle
     * @throws \ImagickException
     * @throws \Mpdf\MpdfException
     */
    function generate($dateData, $countryData, $render, $filePath, $fileName, $orientation, $noHolidays, $PDFTitle)
    {

        $gii= new Gii();

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

        if ($noHolidays){
            $mpdf->SetTitle($PDFTitle['noHolidays']);
        } else {
            $mpdf->SetTitle($PDFTitle['holidays']);
        }

        $stylesheet = file_get_contents($gii->realPath() . '/frontend/web/css/scss/main.css'); // external css
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($render);

        if (!Yii::$app->request->get('output')){
            $mpdf->Output($filePath . $fileName . '.pdf', \Mpdf\Output\Destination::FILE);
        } else {
            $mpdf->Output($fileName . '.pdf', 'I');
        }

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
