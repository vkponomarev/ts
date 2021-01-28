<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\moon\Moon;

class SiteMapGenerateCalendarMoonPhasesMonthsRU
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
        $countMonths = 0;

        $moon = new Moon();
        $moonPhases = $moon->phasesArray();
        $moonPhasesCount = count($moonPhases);

        // Проходим по всем годам.
        foreach (range(101, 9998) as $year) {

            if ($year < 1000) {
                $year = str_pad($year, 4, '0', STR_PAD_LEFT);
            }
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');


            foreach ($languagesData as $language) {
                if ($language['url'] <> 'ru') {
                    continue;
                }

                $countMonths = 0;
                foreach (range(1, 12) as $month) {
                    $countMonths++;


                    $countPhases = 0;
                    foreach ($moonPhases as $phaseURL => $phase) {
                        $countPhases++;

                        $countLimit++;

                        $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-moon-phases-months-name.php', [
                            'language' => $language,
                            'year' => $year,
                            'phase' => $phaseURL,
                            'month' => str_pad($month, 2, '0', STR_PAD_LEFT),
                        ]);

                        if (($countLimit >= 49998) or
                            (($year == 9998) and
                                ($countMonths == 12) and
                                ($countPhases == $moonPhasesCount))
                        ) {

                            $countFiles++;

                            $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                'siteMapUrls' => $siteMapUrls,
                            ]);

                            // Создаем файл
                            $gii = new Gii();
                            $fileName = 'sitemap_calendar_moon_phases_months_ru_' . $countFiles;
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

}
