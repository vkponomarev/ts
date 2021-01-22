<?php

namespace common\components\gii\giiPDF;


use common\components\gii\Gii;


class GiiPDFGeneratePDFCalendarMoonYearly
{


    function generate($languagesData)
    {
        set_time_limit(500000);

        $gii = new Gii();
        $bigData = new \common\components\bigData\BigData();

        $PDFCalendarYearlyPages = [
            'P' => 'calendar-moon-yearly-portrait-one',
            'L' => 'calendar-moon-yearly-landscape-one',
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

                foreach ($PDFCalendarYearlyOrientation as $orientation) {

                    $count++;
                    $bigData->saveData($count, 'work');

                    $params['languageID'] = $language['id'];
                    $params['countryID'] = 0;
                    $params['yearURL'] = $eachYear;
                    $params['orientation'] = $orientation;
                    $params['language'] = $language['url'];
                    $params['pageName'] = $PDFCalendarYearlyPages[$orientation];

                    $gii->makeAction($params, 'frontend\controllers', 'generate-moon-years/generate-pdf');

                }
            }
        }
    }

}
