<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;


class SiteMapGenerateTimeDifferenceCitiesCities
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
            order by population desc 
            limit 500            
            ')
            ->queryAll();

        // Проходим по всем городам.
        $countCities = 0;
        foreach ($cities as $city) {
            $countCities++;

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countCities2 = 0;
            foreach ($cities as $city2) {
                $countCities2++;
                if ($city['url'] == $city2['url']){
                    continue;
                }

                    $countLang = 0;
                foreach ($languagesData as $language) {
                    $countLang++;

                    $countLimit++;

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_time_difference-cities-cities.php', [
                        'language' => $language,
                        'city' => $city['url'],
                        'city2' => $city2['url'],
                    ]);

                    if (($countLimit >= 49990) or (
                            ($countCities == count($cities)) and
                            ($countCities2 == count($cities)) and
                            ($languagesDataCount == $countLang)
                        )) {

                        $countFiles++;

                        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                            'siteMapUrls' => $siteMapUrls,
                        ]);

                        // Создаем файл
                        $gii = new Gii();
                        $fileName = 'sitemap_time_difference_cities_cities_' . $countFiles;
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
