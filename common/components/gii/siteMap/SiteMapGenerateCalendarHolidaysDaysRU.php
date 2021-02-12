<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\holidays\Holidays;
use common\componentsV2\date\Date;

class SiteMapGenerateCalendarHolidaysDaysRU
{
    /**
     *
     * @param $languagesData
     * @throws \yii\db\Exception
     */
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


            foreach ($languagesData as $language) {
                if ($language['url'] <> 'ru'){
                    continue;
                }


                $countMonths = 0;
                foreach (range(1, 12) as $month) {
                    $countMonths++;

                    ($date = new Date("{$year}-{$month}-01"))->year()->month();

                    $countDays = 0;
                    foreach (range(1, $date->month->daysCount) as $day) {
                        $countDays++;

                        $countLimit++;

                        $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-days.php', [
                            'language' => $language,
                            'year' => $year,
                            'month' => str_pad($month, 2, '0', STR_PAD_LEFT),
                            'day' => str_pad($day, 2, '0', STR_PAD_LEFT),
                        ]);

                        if (($countLimit >= 49998) or
                            (($year == $holidaysRange['end']) and
                                ($countMonths == 12) and
                                ($countDays == $date->month->daysCount)
                            )) {

                            $countFiles++;

                            $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                                'siteMapUrls' => $siteMapUrls,
                            ]);

                            // Создаем файл
                            $gii = new Gii();
                            $fileName = 'sitemap_calendar_holidays_days_ru_' . $countFiles;
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
