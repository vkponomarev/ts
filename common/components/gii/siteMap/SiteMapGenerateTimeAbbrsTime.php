<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;


class SiteMapGenerateTimeAbbrsTime
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

        $abbrs = \Yii::$app->db
            ->createCommand('
            select
            tc.url,
            tc.id
            from
            time_timezone as tc
            where tc.active = 1
            order by id
            ')
            ->queryAll();

        $abbrsTimes = \Yii::$app->db
            ->createCommand('
            select
            tto.url,
            tto.id
            from
            time_timezone_offset as tto
            where tto.active = 1
            order by id
            ')
            ->queryAll();

        // Проходим по всем городам.
        $countAbbrs = 0;
        foreach ($abbrs as $abbr) {
            $countAbbrs++;

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');
            $countAbbrsTimes = 0;
            foreach ($abbrsTimes as $abbrsTime) {
                $countAbbrsTimes++;

                $countLang = 0;
                foreach ($languagesData as $language) {
                    $countLang++;

                    $countLimit++;

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_time_abbrs_time.php', [
                        'language' => $language,
                        'abbr' => $abbr['url'],
                        'abbrTime' => $abbrsTime['url'],
                    ]);

                    if (($countLimit >= 49990) or (
                            ($countAbbrs == count($abbrs)) and
                            ($languagesDataCount == $countLang) and
                            ($countAbbrsTimes == count($abbrsTimes))
                        )) {

                        $countFiles++;

                        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                            'siteMapUrls' => $siteMapUrls,
                        ]);

                        // Создаем файл
                        $gii = new Gii();
                        $fileName = 'sitemap_time_abbrs_time_' . $countFiles;
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
