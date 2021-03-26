<?php

namespace common\components\gii\giiPDF;


use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\holidays\Holidays;
use Yii;

/**
 * Класс отвечающий за генерацию PDF календаря на год
 * Class GiiPDFGeneratePDFCalendarYearly
 * @package common\components\gii\giiPDF
 */
class GiiPDFGeneratePDFCalendarYearly
{

    /**
     * Генерация PDF календаря на год с праздниками и без
     * @param $languagesData
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    function generate($languagesData)
    {
        set_time_limit(500000);
        ini_set("memory_limit", "20000M");
        $gii = new Gii();
        $bigData = new \common\components\bigData\BigData();

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        $countries = new Countries();
        $countriesByPDFGeneration = $countries->byPDFGeneration();

        $PDFCalendarYearlyPages = [
            'P' => 'calendar-yearly-portrait-one',
            'L' => 'calendar-yearly-landscape-one',
        ];

        $PDFCalendarYearlyOrientation = [
            1 => 'P',
            2 => 'L',
        ];

        $count = 0;
        foreach (range(2019, 2022) as $eachYear) {

            foreach ($languagesData as $language) {
                //$count++;
                //if ($count <= 11) {continue;};

                if ($eachYear >= $holidaysRange['start'] && $eachYear <= $holidaysRange['end']){
                    foreach ($countriesByPDFGeneration as $eachCountry) {

                        foreach ($PDFCalendarYearlyOrientation as $orientation) {

                            $count++;
                            $bigData->saveData($count, 'work');

                            $params['languageID'] = $language['id'];
                            $params['countryID'] = $eachCountry['id'];
                            $params['yearURL'] = str_pad($eachYear, 4, '0', STR_PAD_LEFT);
                            $params['orientation'] = $orientation;
                            $params['language'] = $language['url'];
                            $params['pageName'] = $PDFCalendarYearlyPages[$orientation];

                            $gii->makeAction($params, 'frontend\controllers', 'generate/generate-pdf');

                        }
                    }
                } else {
                    foreach ($PDFCalendarYearlyOrientation as $orientation) {

                        $count++;
                        $bigData->saveData($count, 'work');

                        $params['languageID'] = $language['id'];
                        $params['countryID'] = 171;
                        $params['yearURL'] = str_pad($eachYear, 4, '0', STR_PAD_LEFT);
                        $params['orientation'] = $orientation;
                        $params['language'] = $language['url'];
                        $params['pageName'] = $PDFCalendarYearlyPages[$orientation];

                        $gii->makeAction($params, 'frontend\controllers', 'generate/generate-pdf');
                    }
                }
            }
        }
    }
}
