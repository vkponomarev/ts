<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\moon\Moon;

class SiteMapGenerateCalendarMoonPhasesYears
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

        $moon = new Moon();
        $moonPhases = $moon->phasesArray();
        $moonPhasesCount = count($moonPhases);

        foreach (range(101, 9998) as $year) {

            if ($year < 1000) {
                $year = str_pad($year, 4, '0', STR_PAD_LEFT);
            }

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;

                $countPhases = 0;
                foreach ($moonPhases as $phaseURL => $phase) {
                    $countPhases++;

                    $countLimit++;

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-moon-phases-years-name.php', [
                        'language' => $language,
                        'year' => $year,
                        'phase' => $phaseURL,
                    ]);

                    if (($countLimit >= 49998) or (($year == 9998) and ($languagesDataCount == $countLang) and ($countPhases == $moonPhasesCount))) {

                        $countFiles++;

                        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                            'siteMapUrls' => $siteMapUrls,
                        ]);

                        // Создаем файл
                        $gii = new Gii();
                        $fileName = 'sitemap_calendar_moon_phases_years_' . $countFiles;
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

}