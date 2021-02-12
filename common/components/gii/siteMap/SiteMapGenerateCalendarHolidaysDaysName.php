<?php

namespace common\components\gii\siteMap;


use common\components\countries\Countries;
use common\components\gii\Gii;
use common\components\holidays\Holidays;

class SiteMapGenerateCalendarHolidaysDaysName
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

        $holidaysDayName = ['yesterday', 'today', 'tomorrow'];

        // Проходим по всем годам.

        $countLang = 0;
        foreach ($languagesData as $language) {
            $countLang++;

            $countLimit++;
            $countLimit++;
            $countLimit++;

            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-days-names.php', [
                'language' => $language,
                'dayName' => 'yesterday',
            ]);
            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-days-names.php', [
                'language' => $language,
                'dayName' => 'today',
            ]);
            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-days-names.php', [
                'language' => $language,
                'dayName' => 'tomorrow',
            ]);

            $countCountry = 0;
            foreach ($countriesData as $country) {
                $countCountry++;

                $countLimit++;
                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-holidays-days-names-country.php', [
                    'language' => $language,
                    'dayName' => 'today',
                    'country' => $country['url'],
                ]);

                if (($countLimit >= 49998) or
                    (   ($languagesDataCount == $countLang) and
                        ($countriesDataCount == $countCountry)
                    )) {

                    $countFiles++;

                    $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                        'siteMapUrls' => $siteMapUrls,
                    ]);

                    // Создаем файл
                    $gii = new Gii();
                    $fileName = 'sitemap_calendar_holidays_days_names_' . $countFiles;
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
