<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;

class SiteMapGenerateCalendarReligionYears
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

        $religions = ['orthodox', 'catholic', 'muslim', 'jewish', 'hindu'];

        foreach (range(2000, 2030) as $year) {

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;

                $countReligion = 0;
                foreach ($religions as $religion) {
                    $countReligion++;

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-religion-years.php', [
                        'language' => $language,
                        'year' => $year,
                        'religion' => $religion,
                    ]);

                    $countLimit++;

                    if (($countLimit >= 49998) or (($year == 2030) and ($languagesDataCount == $countLang) and ($countReligion == 5))) {

                        $countFiles++;
                        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                            'siteMapUrls' => $siteMapUrls,
                        ]);

                        // Создаем файл
                        $gii = new Gii();
                        $fileName = 'sitemap_calendar_religion_years_' . $countFiles;
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
