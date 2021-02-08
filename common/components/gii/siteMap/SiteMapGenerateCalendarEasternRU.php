<?php

namespace common\components\gii\siteMap;


use common\components\countries\Countries;
use common\components\gii\Gii;

class SiteMapGenerateCalendarEasternRU
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


        foreach ($languagesData as $language) {
            if ($language['url'] <> 'ru') {
                continue;
            }

            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-eastern.php', [
                'language' => $language,

            ]);

            $countLimit++;


            $countFiles++;
            $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                'siteMapUrls' => $siteMapUrls,
            ]);

            // Создаем файл
            $gii = new Gii();
            $fileName = 'sitemap_calendar_eastern_ru_' . $countFiles;
            $gii->generateFile($siteMapContent, $fileName . '.xml', $gii->realPath() . '/frontend/views/gii/sitemap/');

            $siteMapContent = '';
            $siteMapUrls = '';
            $fileName = '';
            $countLimit = 0;


        }

    }


}
