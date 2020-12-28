<?php

namespace common\components\gii\giiPDF;


/**
 * Class GiiPDF
 * @package common\components\gii\giiPDF
 * Класс отвечающий за генерацию PDF календарей
 */
class GiiPDF
{

    function __construct()
    {

    }

    /**
     * Здесь происходит непосредственная генерация PDF файла и файла картинки для этого PDF
     * @param $dateData array
     * @param $countryData array
     * @param $render string
     * @param $filePath string
     * @param $fileName string
     * @param $orientation string
     * @param $noHolidays integer
     * @throws \ImagickException
     * @throws \Mpdf\MpdfException
     */
    function generatePDF($dateData, $countryData, $render, $filePath, $fileName, $orientation, $noHolidays){

        (new GiiPDFGeneratePDF())->generate($dateData, $countryData, $render, $filePath, $fileName, $orientation, $noHolidays);

    }

    /**
     * Генерация PDF календаря на год
     * @param $languagesData
     * @throws \yii\base\InvalidConfigException
     */
    function generatePDFCalendarYearly($languagesData){

        (new GiiPDFGeneratePDFCalendarYearly())->generate($languagesData);

    }


}
