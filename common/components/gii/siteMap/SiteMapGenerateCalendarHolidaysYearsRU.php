<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\holidays\Holidays;

class SiteMapGenerateCalendarHolidaysYearsRU
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



            foreach ($languagesData as $language) {
                if ($language['url'] <> 'ru'){
                    continue;
                }
                $countLimit++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-years.php', [
                    'language' => $language,
                    'year' => $year,
                ]);


                $countCountry = 0;
                foreach ($countriesData as $country) {
                    $countCountry++;
                    $countLimit++;

                    $count++;
                    $bigData = new BigData();
                    $bigData->saveData($countLimit, 'sitemap');

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-years-country.php', [
                        'language' => $language,
                        'year' => $year,
                        'country' => $country['url'],
                    ]);

                    if (($countLimit >= 49998) or (($year == $holidaysRange['end']) and ($countriesDataCount == $countCountry))) {

                        $countFiles++;

                        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                            'siteMapUrls' => $siteMapUrls,
                        ]);

                        // Создаем файл
                        $gii = new Gii();
                        $fileName = 'sitemap_calendar_holidays_years_ru_' . $countFiles;
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
