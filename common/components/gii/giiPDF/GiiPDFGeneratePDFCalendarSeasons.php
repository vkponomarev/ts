<?php

namespace common\components\gii\giiPDF;


use common\components\countries\Countries;
use common\components\country\Country;
use common\components\gii\Gii;

/**
 * Генерация PDF календаря по сезонам
 * Class GiiPDFGeneratePDFCalendarSeasons
 * @package common\components\gii\giiPDF
 */
class GiiPDFGeneratePDFCalendarSeasons
{

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
            'P' => 'calendar-seasons-portrait-one',
            'L' => 'calendar-seasons-landscape-one',
        ];

        $PDFCalendarOrientation = [
            1 => 'P',
            2 => 'L',
        ];

        $PDFCalendarSeasons = [
            1 => 'winter',
            2 => 'spring',
            3 => 'summer',
            4 => 'autumn',
        ];


        $count = 0;
        foreach (range(2024, 2024) as $eachYear) {

            foreach ($languagesData as $language) {
                //$count++;
                //if ($count <= 11) {continue;};

                foreach ($countriesByPDFGeneration as $eachCountry) {

                    $countryData = $country->data($language['id'], $eachCountry['id']);

                    foreach ($PDFCalendarOrientation as $orientation) {

                        foreach ($PDFCalendarSeasons as $season) {
                            $count++;
                            $bigData->saveData($count, 'work');

                            $params['languageID'] = $language['id'];
                            $params['countryURL'] = $eachCountry['url'];
                            $params['yearURL'] = $eachYear;
                            $params['orientation'] = $orientation;
                            $params['language'] = $language['url'];
                            $params['pageName'] = $PDFCalendarPages[$orientation];
                            $params['seasonURL'] = $season;

                            $gii->makeAction($params, 'frontend\controllers', 'generate-seasons/generate-pdf');

                        }

                        $giiPDF->generatePDFUniteSeasons($language['id'], $countryData, $eachYear, $language['url'], $orientation);
                        $giiPDF->generatePDFUniteSeasonsNoHolidays($language['id'], $countryData, $eachYear, $language['url'], $orientation);
                    }
                }
            }
        }
    }

}
