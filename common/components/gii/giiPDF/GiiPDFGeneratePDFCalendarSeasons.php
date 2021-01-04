<?php

namespace common\components\gii\giiPDF;


use common\components\countries\Countries;
use common\components\gii\Gii;


class GiiPDFGeneratePDFCalendarSeasons
{


    function generate($languagesData)
    {
        set_time_limit(500000);

        $gii = new Gii();
        $giiPDF = new GiiPDF();
        $bigData = new \common\components\bigData\BigData();

        $countries = new Countries();
        $countriesByPDFGeneration = $countries->byPDFGeneration();

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

                        $giiPDF->generatePDFUniteSeasons($language['id'], $eachCountry['url'], $eachYear, $language['url'], $orientation);
                        $giiPDF->generatePDFUniteSeasonsNoHolidays($language['id'], $eachCountry['url'], $eachYear, $language['url'], $orientation);
                    }
                }
            }
        }
    }

}
