<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\holidays\Holidays;
use common\componentsV2\zodiacs\Zodiacs;


class SiteMapGenerateCalendarHolidaysRU
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
        $holdaysSitemap = $holidays->bySitemapGeneration();

        // Проходим по всем праздникам.
        $countHolidays = 0;
        foreach ($holdaysSitemap as $holiday) {
            $countHolidays ++;




            foreach ($languagesData as $language) {
                if ($language['url'] <> 'ru'){
                    continue;
                }

                $countLimit++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays.php', [
                    'language' => $language,
                    'holiday' => $holiday['url'],
                ]);


                $countCountry = 0;
                foreach ($countriesData as $country) {
                    $countCountry++;




                    if (!$holidays->byHolidayAndCountryForSitemap($holiday['id'], $country['id']))
                        continue;

                    $countLimit++;


                    $count++;
                    $bigData = new BigData();
                    $bigData->saveData($countLimit, 'sitemap');

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-country.php', [
                        'language' => $language,
                        'holiday' => $holiday['url'],
                        'country' => $country['url'],
                    ]);

                    if (($countLimit >= 49998) or (($countHolidays == count($holdaysSitemap)) and ($countriesDataCount == $countCountry))) {

                        $countFiles++;

                        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                            'siteMapUrls' => $siteMapUrls,
                        ]);

                        // Создаем файл
                        $gii = new Gii();
                        $fileName = 'sitemap_calendar_holidays_ru_' . $countFiles;
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
