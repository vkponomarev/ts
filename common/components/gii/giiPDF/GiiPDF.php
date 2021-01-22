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
     * @throws \yii\db\Exception
     */
    function generatePDFCalendarYearly($languagesData){

        (new GiiPDFGeneratePDFCalendarYearly())->generate($languagesData);

    }

    /**
     * Генерация PDF календаря на год с номерами недель, только без праздников
     * @param $languagesData
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    function generatePDFCalendarYearlyWithWeeks($languagesData){

        (new GiiPDFGeneratePDFCalendarYearlyWithWeeks())->generate($languagesData);

    }

    /**
     * Генерация PDF календаря на неделю
     * @param $languagesData
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    function generatePDFCalendarWeekly($languagesData){

        (new GiiPDFGeneratePDFCalendarWeekly())->generate($languagesData);

    }

    /**
     * Генерация PDF календаря по сезонам
     * @param $languagesData
     * @throws \ImagickException
     * @throws \Mpdf\MpdfException
     * @throws \setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException
     * @throws \setasign\Fpdi\PdfParser\PdfParserException
     * @throws \setasign\Fpdi\PdfParser\Type\PdfTypeException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    function generatePDFCalendarSeasons($languagesData){

        (new GiiPDFGeneratePDFCalendarSeasons())->generate($languagesData);

    }

    /**
     * Генерация PDF календаря по месяцам
     * @param $languagesData
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    function generatePDFCalendarMonths($languagesData){

        (new GiiPDFGeneratePDFCalendarMonths())->generate($languagesData);

    }

    /**
     * Объединение PDF календарей с праздниками по сезонм в один каледарь
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
    function generatePDFUniteSeasons($languageID, $countryURL, $year, $languageURL, $orientation){

        (new GiiPDFGeneratePDFUniteSeasons())->generate($languageID, $countryURL, $year, $languageURL, $orientation);

    }

    /**
     * Объединение PDF календарей без праздников по сезонм в один каледарь
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
    function generatePDFUniteSeasonsNoHolidays($languageID, $countryData, $year, $languageURL, $orientation){

        (new GiiPDFGeneratePDFUniteSeasonsNoHolidays())->generate($languageID, $countryData, $year, $languageURL, $orientation);

    }

    /**
     * Объединение PDF календаря на месяц в один год
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
    function generatePDFUniteMonths($languageID, $countryData, $year, $languageURL, $orientation){

        (new GiiPDFGeneratePDFUniteMonths())->generate($languageID, $countryData, $year, $languageURL, $orientation);

    }

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
     * @throws \setasign\Fpdi\PdfParser\Type\PdfTypeException\
     */
    function generatePDFUniteMonthsNoHolidays($languageID, $countryData, $year, $languageURL, $orientation){

        (new GiiPDFGeneratePDFUniteMonthsNoHolidays())->generate($languageID, $countryData, $year, $languageURL, $orientation);

    }

    function generatePDFCalendarBusinessYearly($languagesData){

        (new GiiPDFGeneratePDFCalendarBusinessYearly())->generate($languagesData);

    }

    function generatePDFCalendarMoonYearly($languagesData){

        (new GiiPDFGeneratePDFCalendarMoonYearly())->generate($languagesData);

    }



}
