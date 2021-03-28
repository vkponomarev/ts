<?php

namespace common\components\gii\giiPDF;


use common\components\countries\Countries;
use common\components\country\Country;
use common\components\gii\Gii;

/**
 * Генерация PDF календаря по месяцам
 * Class GiiPDFGeneratePDFCalendarMonths
 * @package common\components\gii\giiPDF
 */
class GiiPDFGeneratePDFCalendarMonths
{

    /**
     * Генерация PDF календаря по месяцам
     * @param $languagesData
     * @throws \ImagickException
     * @throws \Mpdf\MpdfException
     * @throws \setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException
     * @throws \setasign\Fpdi\PdfParser\PdfParserException
     * @throws \setasign\Fpdi\PdfParser\Type\PdfTypeException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    function generate($languagesData)
    {
        set_time_limit(500000);

        $gii = new Gii();
        $giiPDF = new GiiPDF();
        $bigData = new \common\components\bigData\BigData();

        $countries = new Countries();
        $countriesByPDFGeneration = $countries->byPDFGeneration();

        $country = new Country();

        $PDFCalendarPages = [
            'P' => 'calendar-monthly-portrait-one',
            'L' => 'calendar-monthly-landscape-one',
        ];

        $PDFCalendarOrientation = [
            1 => 'P',
            2 => 'L',
        ];

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

        $count = 0;
        foreach (range(2021, 2022) as $eachYear) {

            foreach ($languagesData as $language) {
                //$count++;
                //if ($count <= 11) {continue;};

                foreach ($countriesByPDFGeneration as $eachCountry) {

                    $countryData = $country->data($language['id'], $eachCountry['id']);

                    foreach ($PDFCalendarOrientation as $orientation) {

                        foreach ($PDFCalendarMonths as $month) {
                            $count++;
                            $bigData->saveData($count, 'work');

                            $params['languageID'] = $language['id'];
                            $params['countryURL'] = $eachCountry['url'];
                            $params['yearURL'] = $eachYear;
                            $params['orientation'] = $orientation;
                            $params['language'] = $language['url'];
                            $params['pageName'] = $PDFCalendarPages[$orientation];
                            $params['monthURL'] = $month;

                            $gii->makeAction($params, 'frontend\controllers', 'generate-months/generate-pdf');

                        }

                        $giiPDF->generatePDFUniteMonths($language['id'], $countryData, $eachYear, $language['url'], $orientation);
                        $giiPDF->generatePDFUniteMonthsNoHolidays($language['id'], $countryData, $eachYear, $language['url'], $orientation);
                    }
                }
            }
        }
    }

}
