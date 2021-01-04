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
    function generatePDF($dateData, $countryData, $render, $filePath, $fileName, $orientation, $noHolidays, $PDFTitle){

        (new GiiPDFGeneratePDF())->generate($dateData, $countryData, $render, $filePath, $fileName, $orientation, $noHolidays, $PDFTitle);

    }

    /**
     * Генерация PDF календаря на год
     * @param $languagesData
     * @throws \yii\base\InvalidConfigException
     */
    function generatePDFCalendarYearly($languagesData){

        (new GiiPDFGeneratePDFCalendarYearly())->generate($languagesData);

    }


    function generatePDFCalendarSeasons($languagesData){

        (new GiiPDFGeneratePDFCalendarSeasons())->generate($languagesData);

    }


    function generatePDFUniteSeasons($languageID, $countryURL, $year, $languageURL, $orientation){

        (new GiiPDFGeneratePDFUniteSeasons())->generate($languageID, $countryURL, $year, $languageURL, $orientation);

    }

    function generatePDFUniteSeasonsNoHolidays($languageID, $countryURL, $year, $languageURL, $orientation){

        (new GiiPDFGeneratePDFUniteSeasonsNoHolidays())->generate($languageID, $countryURL, $year, $languageURL, $orientation);

    }



}
