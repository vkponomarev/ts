<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\holidays\Holidays;


class SiteMapGenerateCalendarHolidays
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
            $countHolidays++;

            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap');

            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;

                $countLimit++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays.php', [
                    'language' => $language,
                    'holiday' => $holiday['url'],
                ]);

                $countriesData = \Yii::$app->db
                    ->createCommand('
                        select
                        distinct holidays_date.countries_id,
                        c.url
                        from
                        holidays_date
                        left join countries as c on c.id = holidays_date.countries_id
                        where
                        holidays_id = ' . $holiday['id'] . '
                        ')
                    ->queryAll();

                //(new \common\components\dump\Dump())->printR($countriesData);die;


                $countCountry = 0;
                foreach ($countriesData as $country) {
                    $countCountry++;

                    $countLimit++;

                    $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-country.php', [
                        'language' => $language,
                        'holiday' => $holiday['url'],
                        'country' => $country['url'],
                    ]);

                    if (($countLimit >= 49998) or (($countHolidays == count($holdaysSitemap)) and ($languagesDataCount == $countLang) and (count($countriesData) == $countCountry))) {

                        $countFiles++;

                        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                            'siteMapUrls' => $siteMapUrls,
                        ]);

                        // Создаем файл
                        $gii = new Gii();
                        $fileName = 'sitemap_calendar_holidays_' . $countFiles;
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
