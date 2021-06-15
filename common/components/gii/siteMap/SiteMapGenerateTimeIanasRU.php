<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;


class SiteMapGenerateTimeIanasRU
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

        $ianas = \Yii::$app->db
            ->createCommand('
            select
            tc.url,
            tc.id
            from
            time_timezone_iana as tc
            order by id
            ')
            ->queryAll();

        // Проходим по всем городам.
        $countIanas = 0;
        foreach ($ianas as $iana) {
            $countIanas++;

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            foreach ($languagesData as $language) {
                if ($language['url'] <> 'ru'){
                    continue;
                }

                $countLimit++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_time_ianas.php', [
                    'language' => $language,
                    'iana' => $iana['url'],
                ]);

                if (($countLimit >= 49990) or (
                        ($countIanas == count($ianas))
                    )) {

                    $countFiles++;

                    $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                        'siteMapUrls' => $siteMapUrls,
                    ]);

                    // Создаем файл
                    $gii = new Gii();
                    $fileName = 'sitemap_time_ianas_ru_' . $countFiles;
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
