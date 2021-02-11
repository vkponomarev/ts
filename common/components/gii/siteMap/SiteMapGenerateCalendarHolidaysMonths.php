<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\holidays\Holidays;

class SiteMapGenerateCalendarHolidaysMonths
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

        $holidays = new Holidays();
        $holidaysRange = $holidays->range();

        // Проходим по всем годам.
        foreach (range($holidaysRange['start'], $holidaysRange['end']) as $year) {

            if ($year < 1000) {
                $year = str_pad($year, 4, '0', STR_PAD_LEFT);
            }
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;


                $countMonths = 0;
                foreach (range(1, 12) as $month) {
                    $countMonths++;


                    $countLimit++;

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-months.php', [
                        'language' => $language,
                        'year' => $year,
                        'month' => str_pad($month, 2, '0', STR_PAD_LEFT),
                    ]);

                    $countCountry = 0;
                    foreach ($countriesData as $country) {
                        $countCountry++;

                        $countLimit++;

                        $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-months-country.php', [
                            'language' => $language,
                            'year' => $year,
                            'country' => $country['url'],
                            'month' => str_pad($month, 2, '0', STR_PAD_LEFT),
                        ]);

                        if (($countLimit >= 49998) or (($year == $holidaysRange['end']) and ($languagesDataCount == $countLang) and ($countriesDataCount == $countCountry) and ($countMonths == 12))) {

                            $countFiles++;

                            $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                'siteMapUrls' => $siteMapUrls,
                            ]);

                            // Создаем файл
                            $gii = new Gii();
                            $fileName = 'sitemap_calendar_holidays_months_' . $countFiles;
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
