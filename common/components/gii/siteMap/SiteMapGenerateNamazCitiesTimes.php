<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;


class SiteMapGenerateNamazCitiesTimes
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

            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;

                $countLimit++;
                $countLimit++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_namaz_cities_times.php', [
                    'language' => $language,
                    'city' => $city['url'],
                    'times' => 'morning',
                ]);

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_namaz_cities_times.php', [
                    'language' => $language,
                    'city' => $city['url'],
                    'times' => 'evening',
                ]);


                if (($countLimit >= 49990) or (
                        ($countCities == count($cities)) and
                        ($languagesDataCount == $countLang)
                    )) {

                    $countFiles++;

                    $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                        'siteMapUrls' => $siteMapUrls,
                    ]);

                    // Создаем файл
                    $gii = new Gii();
                    $fileName = 'sitemap_namaz_cities_times_' . $countFiles;
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