<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;

class SiteMapGenerateCalendarWorkingYearsRU
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


        foreach (range(2000, 2030) as $year) {

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');


            foreach ($languagesData as $language) {
                if ($language['url'] <> 'ru'){
                    continue;
                }


                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-working-years.php', [
                    'language' => $language,
                    'year' => $year,
                ]);

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-days-off-years.php', [
                    'language' => $language,
                    'year' => $year,
                ]);

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-six-days-years.php', [
                    'language' => $language,
                    'year' => $year,
                ]);
                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-40-years.php', [
                    'language' => $language,
                    'year' => $year,
                ]);
                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-36-years.php', [
                    'language' => $language,
                    'year' => $year,
                ]);
                $countLimit++;
                $countLimit++;
                $countLimit++;
                $countLimit++;
                $countLimit++;
                $countCountries = 0;
                foreach ($countriesData as $country) {
                    $countCountries++;

                    $countLimit++;
                    $countLimit++;
                    $countLimit++;
                    $countLimit++;
                    $countLimit++;
                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-working-years-country.php', [
                        'language' => $language,
                        'year' => $year,
                        'country' => $country,
                    ]);

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-days-off-years-country.php', [
                        'language' => $language,
                        'year' => $year,
                        'country' => $country,
                    ]);

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-six-days-years-country.php', [
                        'language' => $language,
                        'year' => $year,
                        'country' => $country,
                    ]);

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-40-years-country.php', [
                        'language' => $language,
                        'year' => $year,
                        'country' => $country,
                    ]);

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-36-years-country.php', [
                        'language' => $language,
                        'year' => $year,
                        'country' => $country,
                    ]);


                    if (($countLimit >= 49998) or (($year == 2030) and ($countriesDataCount == $countCountries))) {

                        $countFiles++;
                        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                            'siteMapUrls' => $siteMapUrls,
                        ]);

                        // Создаем файл
                        $gii = new Gii();
                        $fileName = 'sitemap_calendar_working_years_ru_' . $countFiles;
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
