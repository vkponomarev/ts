<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;


class SiteMapGenerateNamazCitiesMonthsRU
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

        $cities = \Yii::$app->db
            ->createCommand('
            select
            tc.url,
            tc.id
            from
            time_cities as tc
            order by id
            ')
            ->queryAll();

        // Проходим по всем городам.
        $countCities = 0;
        foreach ($cities as $city) {
            $countCities++;

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            foreach (range(2021, 2021) as $year) {

                $countMonths = 0;
                foreach (range(1, 12) as $month) {
                    $countMonths++;

                    foreach ($languagesData as $language) {
                        if ($language['url'] <> 'ru'){
                            continue;
                        }

                        $countLimit++;

                        $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_namaz_cities_months.php', [
                            'language' => $language,
                            'city' => $city['url'],
                            'year' => $year,
                            'month' => str_pad($month, 2, '0', STR_PAD_LEFT),
                        ]);

                        if (($countLimit >= 49990) or (
                                ($year == 2021) and
                                ($countCities == count($cities)) and
                                ($countMonths == 12)
                            )) {

                            $countFiles++;

                            $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                'siteMapUrls' => $siteMapUrls,
                            ]);

                            // Создаем файл
                            $gii = new Gii();
                            $fileName = 'sitemap_namaz_cities_months_ru_' . $countFiles;
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
