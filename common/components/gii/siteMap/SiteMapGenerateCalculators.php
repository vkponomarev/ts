<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\componentsV2\calculators\CalculatorsConversionNumbersArray;


class SiteMapGenerateCalculators
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

        $cities = \Yii::$app->db
            ->createCommand('
            select
            tc.url,
            tc.id
            from
            time_cities as tc
            order by id
            ')
            ->queryAll();

        $timesConvertArray = (new CalculatorsConversionNumbersArray())->array;

        $times = [
            'seconds',
            'minutes',
            'hours',
            'days',
            'weeks',
            'months',
            'years',
        ];


        // Проходим по временам.
        $countTimes = 0;
        foreach ($times as $time) {
            $countTimes++;

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;

                $countLimit++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calculators-names.php', [
                    'language' => $language,
                    'time' => $time,
                ]);

                $countTimes2 = 0;
                foreach ($times as $time2) {
                    $countTimes2++;

                    if ($time <> $time2) {
                        $countLimit++;
                        $countLimit++;

                        $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calculators-how-many.php', [
                            'language' => $language,
                            'time' => $time,
                            'time2' => $time2,
                        ]);

                        $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calculators-convert.php', [
                            'language' => $language,
                            'time' => $time,
                            'time2' => $time2,
                        ]);
                    }

                    if ($timesConvertArray[$countTimes][$countTimes2]) {
                        $countTimes3 = 0;
                        foreach ($timesConvertArray[$countTimes][$countTimes2] as $time3) {
                            $countTimes3++;

                            $countLimit++;

                            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calculators-convert-time.php', [
                                'language' => $language,
                                'time' => $time,
                                'time2' => $time2,
                                'time3' => $time3,
                            ]);

                            if (($countLimit >= 49990) or (
                                    ($countTimes == count($times)) and
                                    ($countTimes2 == count($times)) and
                                    ($countTimes3 == count($timesConvertArray[$countTimes][$countTimes2])) and
                                    ($languagesDataCount == $countLang)
                                )) {

                                $countFiles++;

                                $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                    'siteMapUrls' => $siteMapUrls,
                                ]);

                                // Создаем файл
                                $gii = new Gii();
                                $fileName = 'sitemap_calculators_' . $countFiles;
                                $gii->generateFile($siteMapContent, $fileName . '.xml', $gii->realPath() . '/frontend/views/gii/sitemap/');

                                $siteMapContent = '';
                                $siteMapUrls = '';
                                $fileName = '';
                                $countLimit = 0;

                            }


                        }
                    } else {
                        if (($countLimit >= 49990) or (
                                ($countTimes == count($times)) and
                                ($countTimes2 == count($times)) and
                                ($languagesDataCount == $countLang)
                            )) {

                            $countFiles++;

                            $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                'siteMapUrls' => $siteMapUrls,
                            ]);

                            // Создаем файл
                            $gii = new Gii();
                            $fileName = 'sitemap_calculators_' . $countFiles;
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
