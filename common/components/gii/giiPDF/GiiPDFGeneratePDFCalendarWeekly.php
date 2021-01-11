<?php

namespace common\components\gii\giiPDF;


use common\components\countries\Countries;
use common\components\date\Date;
use common\components\gii\Gii;

/**
 * Класс отвечающий за генерацию PDF календаря на неделю
 * Class GiiPDFGeneratePDFCalendarYearly
 * @package common\components\gii\giiPDF
 */
class GiiPDFGeneratePDFCalendarWeekly
{

    /**
     * Генерация PDF календаря на год на неделю
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
            'P' => 'calendar-weekly-portrait-one',
            'L' => 'calendar-weekly-landscape-one',
        ];

        $PDFCalendarYearlyOrientation = [
            1 => 'P',
            2 => 'L',
        ];

        $date = new Date();


        $count = 0;
        foreach (range(2026, 2026) as $eachYear) {

            $dateData = $date->yearWeeks($eachYear);
            //(new \common\components\dump\Dump())->printR($dateData);die;


            foreach (range(1, $dateData['week']['count']) as $week) {

                foreach ($languagesData as $language) {
                    //$count++;
                    //if ($count <= 11) {continue;};

                    foreach ($PDFCalendarYearlyOrientation as $orientation) {

                        $count++;
                        $bigData->saveData($count, 'work');

                        $params['languageID'] = $language['id'];
                        $params['countryID'] = 171; // Указано просто как заглушка.
                        $params['yearURL'] = $eachYear;
                        $params['weekURL'] = str_pad($week, 2, '0', STR_PAD_LEFT);
                        $params['orientation'] = $orientation;
                        $params['language'] = $language['url'];
                        $params['pageName'] = $PDFCalendarYearlyPages[$orientation];

                        $gii->makeAction($params, 'frontend\controllers', 'generate-weeks/generate-pdf');

                    }

                }
            }
        }
    }

}
