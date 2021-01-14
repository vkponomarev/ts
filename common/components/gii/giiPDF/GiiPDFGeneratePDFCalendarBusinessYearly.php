<?php

namespace common\components\gii\giiPDF;


use common\components\countries\Countries;
use common\components\gii\Gii;
use Yii;


class GiiPDFGeneratePDFCalendarBusinessYearly
{


    function generate($languagesData)
    {
        set_time_limit(500000);

        $gii = new Gii();
        $bigData = new \common\components\bigData\BigData();

        $countries = new Countries();
        $countriesByPDFGeneration = $countries->byPDFGeneration();

        $PDFCalendarYearlyPages = [
            'P' => 'calendar-business-yearly-portrait-one',
            'L' => 'calendar-business-yearly-landscape-one',
        ];

        $PDFCalendarYearlyOrientation = [
            1 => 'P',
            2 => 'L',
        ];

        $count = 0;
        foreach (range(2021, 2021) as $eachYear) {

            foreach ($languagesData as $language) {
                //$count++;
                //if ($count <= 11) {continue;};

                foreach ($countriesByPDFGeneration as $eachCountry) {

                    foreach ($PDFCalendarYearlyOrientation as $orientation) {

                        $count++;
                        $bigData->saveData($count, 'work');

                        $params['languageID'] = $language['id'];
                        $params['countryID'] = $eachCountry['id'];
                        $params['yearURL'] = $eachYear;
                        $params['orientation'] = $orientation;
                        $params['language'] = $language['url'];
                        $params['pageName'] = $PDFCalendarYearlyPages[$orientation];

                        $gii->makeAction($params, 'frontend\controllers', 'generate-business-years/generate-pdf');

                    }
                }
            }
        }
    }

}
