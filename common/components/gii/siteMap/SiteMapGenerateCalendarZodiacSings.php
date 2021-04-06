<?php

namespace common\components\gii\siteMap;


use common\components\countries\Countries;
use common\components\gii\Gii;
use common\componentsV2\zodiacs\Zodiacs;

class SiteMapGenerateCalendarZodiacSings
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

        ($zodiacs = new Zodiacs());


        $countLang = 0;
        foreach ($languagesData as $language) {
            $countLang++;

            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_zodiac.php', [
                'language' => $language,
            ]);

            $zodiacCount = 0;
            foreach ($zodiacs->urls->ids as $key => $sign) {
                $zodiacCount++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_zodiac-signs.php', [
                    'language' => $language,
                    'sign' => $sign,
                ]);

                $countLimit++;

                if (($countLimit >= 49990) or (($zodiacCount == 12) and ($languagesDataCount == $countLang))) {

                    $countFiles++;
                    $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                        'siteMapUrls' => $siteMapUrls,
                    ]);

                    // Создаем файл
                    $gii = new Gii();
                    $fileName = 'sitemap_zodiac_signs_' . $countFiles;
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
