<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\moon\Moon;

class SiteMapGenerateCalendarMoonGardenerMonths
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
        // Проходим по всем годам.

        $moon = new Moon();
        $moonGardener = $moon->gardener();
        $moonGardenerCount = count($moonGardener);

        foreach (range(101, 9999) as $year) {

            if ($year < 1000) {
                $year = str_pad($year, 4, '0', STR_PAD_LEFT);
            }
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;

                $countMonths = 0;
                foreach (range(1, 12) as $month) {
                    $countMonths++;

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-moon-gardener-months.php', [
                        'language' => $language,
                        'year' => $year,
                        'month' => str_pad($month, 2, '0', STR_PAD_LEFT),
                    ]);

                    $countLimit++;

                    $countGardener = 0;
                    foreach ($moonGardener as $gardenerURL => $gardener) {
                        $countGardener++;

                        $countLimit++;

                        $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-moon-gardener-months-veggie.php', [
                            'language' => $language,
                            'year' => $year,
                            'month' => str_pad($month, 2, '0', STR_PAD_LEFT),
                            'gardener' => $gardenerURL,
                        ]);

                        if (($countLimit >= 49998) or
                            (($year == 9998) and
                                ($languagesDataCount == $countLang) and
                                ($countMonths == 12) and
                                ($countGardener == $moonGardenerCount))
                        ) {

                            $countFiles++;

                            $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                'siteMapUrls' => $siteMapUrls,
                            ]);

                            // Создаем файл
                            $gii = new Gii();
                            $fileName = 'sitemap_calendar_moon_gardener_months_' . $countFiles;
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
