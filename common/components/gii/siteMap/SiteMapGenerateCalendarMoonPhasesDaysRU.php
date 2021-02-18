<?php

namespace common\components\gii\siteMap;


use common\components\countries\Countries;
use common\components\gii\Gii;

class SiteMapGenerateCalendarMoonPhasesDaysRU
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



        foreach ($languagesData as $language) {
            if ($language['url'] <> 'ru'){
                continue;
            }


            $startDay = new \DateTime('2000-01-01');
            $eachDay = $startDay;

            $endDay = new \DateTime('2030-12-31');
            $endDayFormatted = $endDay->format('Y-m-d');

            $countLimit++;
            $countLimit++;
            $countLimit++;

            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-moon-phases-days.php', [
                'language' => $language,
                'date' => 'today',
            ]);

            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-moon-phases-days.php', [
                'language' => $language,
                'date' => 'tomorrow',
            ]);

            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-moon-phases-days.php', [
                'language' => $language,
                'date' => 'yesterday',
            ]);

            while ($eachDay->format('Y-m-d') <= $endDayFormatted) {

                $countLimit++;

                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_calendar-moon-phases-days.php', [
                    'language' => $language,
                    'date' => $eachDay->format('Y-m-d'),
                ]);

                if (($countLimit >= 49998) or (($eachDay->format('Y-m-d') == $endDayFormatted))) {

                    $countFiles++;

                    $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-file.php', [
                        'siteMapUrls' => $siteMapUrls,
                    ]);

                    // Создаем файл
                    $gii = new Gii();
                    $fileName = 'sitemap_calendar_moon_phases_days_ru_' . $countFiles;
                    $gii->generateFile($siteMapContent, $fileName . '.xml', $gii->realPath() . '/frontend/views/gii/sitemap/');

                    $siteMapContent = '';
                    $siteMapUrls = '';
                    $fileName = '';
                    $countLimit = 0;
                }
                $eachDay->modify('+1 day');
            }

        }
    }

}