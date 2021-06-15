<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;


class SiteMapGenerateTimeCountriesRU
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

        $countries = \Yii::$app->db
            ->createCommand('
            select
            tc.url,
            tc.id
            from
            time_countries as tc
            order by id
            ')
            ->queryAll();

        // Проходим по всем городам.
        $countCountries = 0;
        foreach ($countries as $country) {
            $countCountries++;

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            foreach ($languagesData as $language) {
                if ($language['url'] <> 'ru'){
                    continue;
                }

                $countLimit++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_time_countries.php', [
                    'language' => $language,
                    'country' => $country['url'],
                ]);

                if (($countLimit >= 49990) or (
                        ($countCountries == count($countries))
                    )) {

                    $countFiles++;

                    $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                        'siteMapUrls' => $siteMapUrls,
                    ]);

                    // Создаем файл
                    $gii = new Gii();
                    $fileName = 'sitemap_time_countries_ru_' . $countFiles;
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
