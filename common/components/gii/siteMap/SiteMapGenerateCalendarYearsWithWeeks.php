<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;

class SiteMapGenerateCalendarYearsWithWeeks
{

    function generate($languagesData)
    {

        $countries = new Countries();
        $countriesData = $countries->bySiteMapGeneration();
        $countriesDataCount = count($countriesData);
        $languagesDataCount = count($languagesData);
        $countLimit = 0;
        $countFiles = 0;
        $count = 0;
        $siteMapUrls = '';
        // Проходим по всем годам.


        foreach (range(2000, 2030) as $year) {

            if ($year < 1000) {
                $year = str_pad($year, 4, '0', STR_PAD_LEFT);
            }
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;

                $countLimit++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-years-with-weeks.php', [
                    'language' => $language,
                    'year' => $year,
                ]);

                if (($countLimit >= 49998) or (($year == 9999) and ($languagesDataCount == $countLang))) {

                    $countFiles++;

                    $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                        'siteMapUrls' => $siteMapUrls,
                    ]);

                    // Создаем файл
                    $gii = new Gii();
                    $fileName = 'sitemap_calendar_years_with_weeks_' . $countFiles;
                    $gii->generateFile($siteMapContent, $fileName . '.xml', $gii->realPath() . '/frontend/views/gii/sitemap/');

                    $siteMapContent = '';
                    $siteMapUrls = '';
                    $fileName = '';
                    $countLimit = 0;
                }


            }

        }


    }

}
