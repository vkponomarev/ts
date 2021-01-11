<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;

class SiteMapGenerateCalendarSeasonsRU
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

        $PDFCalendarSeasons = [
            1 => 'winter',
            2 => 'spring',
            3 => 'summer',
            4 => 'autumn',
        ];

        // Проходим по всем годам.
        foreach (range(1, 9999) as $year) {

            if ($year < 1000) {
                $year = str_pad($year, 4, '0', STR_PAD_LEFT);
            }
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                if ($language['url'] <> 'ru'){
                    continue;
                }
                $countLang++;

                $countSeasons = 0;
                foreach ($PDFCalendarSeasons as $season) {
                    $countSeasons++;

                    if ($year >= 2000 && $year <= 2030) {

                        $countCountries = 0;
                        foreach ($countriesData as $country) {
                            $countCountries++;

                            $countLimit++;

                            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-seasons-country.php', [
                                'language' => $language,
                                'year' => $year,
                                'country' => $country,
                                'season' => $season,
                            ]);

                            if (($countLimit >= 49998) or
                                    (($year == 9999)
                                        and ($countriesDataCount == $countCountries)
                                        and ($countSeasons == 4)))
                            {

                                $countFiles++;

                                $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                    'siteMapUrls' => $siteMapUrls,
                                ]);

                                // Создаем файл
                                $gii = new Gii();
                                $fileName = 'sitemap_calendar_seasons_ru_' . $countFiles;
                                //(new \common\components\dump\Dump())->printR($gii->realPath());
                                $gii->generateFile($siteMapContent, $fileName . '.xml', $gii->realPath() . '/frontend/views/gii/sitemap/');

                                $siteMapContent = '';
                                $siteMapUrls = '';
                                $fileName = '';
                                $countLimit = 0;
                            }
                        }

                    } else {

                        $countLimit++;

                        $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-seasons.php', [
                            'language' => $language,
                            'year' => $year,
                            'season' => $season,
                        ]);

                        if (($countLimit >= 49998) or
                                (($year == 9999) and
                                ($countSeasons == 4)
                            )) {

                            $countFiles++;

                            $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                'siteMapUrls' => $siteMapUrls,
                            ]);

                            // Создаем файл
                            $gii = new Gii();
                            $fileName = 'sitemap_calendar_seasons_ru_' . $countFiles;
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
