<?php

namespace common\components\gii\giiPDF;


use common\components\countries\Countries;
use common\components\gii\Gii;

/**
 * Класс отвечающий за генерацию PDF календаря на год с номерами недель, только без праздников
 * Class GiiPDFGeneratePDFCalendarYearly
 * @package common\components\gii\giiPDF
 */
class GiiPDFGeneratePDFCalendarWeekly
{

    /**
     * Генерация PDF календаря на год с номерами недель, только без праздников
     * @param $languagesData
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    function generate($languagesData)
    {
        set_time_limit(500000);

        $gii = new Gii();
        $bigData = new \common\components\bigData\BigData();

        $countries = new Countries();
        $countriesByPDFGeneration = $countries->byPDFGeneration();

        $PDFCalendarYearlyPages = [
            'P' => 'calendar-yearly-with-weeks-portrait-one',
            'L' => 'calendar-yearly-with-weeks-landscape-one',
        ];

        $PDFCalendarYearlyOrientation = [
            1 => 'P',
            2 => 'L',
        ];

        $count = 0;
        foreach (range(2025, 2025) as $eachYear) {

            foreach ($languagesData as $language) {
                //$count++;
                //if ($count <= 11) {continue;};


                foreach ($PDFCalendarYearlyOrientation as $orientation) {

                    $count++;
                    $bigData->saveData($count, 'work');

                    $params['languageID'] = $language['id'];
                    $params['countryID'] = 171; // Указано просто как заглушка.
                    $params['yearURL'] = $eachYear;
                    $params['orientation'] = $orientation;
                    $params['language'] = $language['url'];
                    $params['pageName'] = $PDFCalendarYearlyPages[$orientation];

                    $gii->makeAction($params, 'frontend\controllers', 'generate-years-with-weeks/generate-pdf');

                }

            }
        }
    }

}
