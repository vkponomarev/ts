<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\componentsV2\eastern\Eastern;

class SiteMapGenerateCalendarEasternAnimals
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

        ($eastern = new Eastern())->animals();


        $animalsCount = 0;
        foreach ($eastern->animals->urls as $key => $animal) {
            $animalsCount++;

            if (!is_numeric($key)){
                continue;
            }
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-eastern-animals.php', [
                    'language' => $language,
                    'animal' => $animal,
                ]);

                $countLimit++;

                if (($countLimit >= 49990) or (($key == 12) and ($languagesDataCount == $countLang))) {

                    $countFiles++;
                    $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                        'siteMapUrls' => $siteMapUrls,
                    ]);

                    // Создаем файл
                    $gii = new Gii();
                    $fileName = 'sitemap_calendar_eastern_animals_' . $countFiles;
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
