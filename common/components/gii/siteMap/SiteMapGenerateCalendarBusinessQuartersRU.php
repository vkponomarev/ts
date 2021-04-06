<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;

class SiteMapGenerateCalendarBusinessQuartersRU
{

    function generate($languagesData)
    {

        $countries = new Countries();
        $countriesData = $countries->bySiteMapGeneration();
        $countriesDataCount = count($countriesData);
        $languagesDataCount = 1;
        $countLimit = 0;
        $countFiles = 0;
        $count = 0;
        $siteMapUrls = '';

        $PDFCalendarQuarters = [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
        ];

        // Проходим по всем годам.
        foreach (range(2000, 2030) as $year) {

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                if ($language['url'] <> 'ru') {
                    continue;
                }
                $countLang++;

                $countQuarters = 0;
                foreach ($PDFCalendarQuarters as $quarter) {
                    $countQuarters++;

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-business-quarters.php', [
                        'language' => $language,
                        'year' => $year,
                        'quarter' => $quarter,
                    ]);


                    $countCountries = 0;
                    foreach ($countriesData as $country) {
                        $countCountries++;

                        $countLimit++;

                        $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-business-quarters-country.php', [
                            'language' => $language,
                            'year' => $year,
                            'country' => $country,
                            'quarter' => $quarter,
                        ]);

                        if (($countLimit >= 49990) or
                            (($year == 2030)
                                and ($countriesDataCount == $countCountries)
                                and ($countQuarters == 4))) {

                            $countFiles++;

                            $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                'siteMapUrls' => $siteMapUrls,
                            ]);

                            // Создаем файл
                            $gii = new Gii();
                            $fileName = 'sitemap_calendar_business_quarters_ru_' . $countFiles;
                            //(new \common\components\dump\Dump())->printR($gii->realPath());
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

}
