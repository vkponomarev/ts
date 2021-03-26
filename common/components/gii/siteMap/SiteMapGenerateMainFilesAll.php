<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\gii\Gii;

class SiteMapGenerateMainFilesAll
{


    function generate()
    {

        /**
         * 1. Создаем основные файлы для сатмапов
         */

        $gii = new Gii();
        $dir = $gii->realPath();

        $siteMapListAll = array_slice(scandir($dir . '/frontend/views/gii/sitemap/'), 2);

        //(new \common\components\dump\Dump())->printR($siteMapListAll);die;

        $countLimit = 0;
        $countFiles = 0;
        $count = 0;
        $siteMapUrls = '';

        foreach ($siteMapListAll as $one) {
            //$count++;
            //$bigData = new BigData();
            //$bigData->saveData($count, 'sitemap-all');

            //Проходим по всем артистам
            $countLang = 0;
            //Добавляем к переменной данные пока $countLimit не станет 49999
            $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-main-file-urls.php', [
                'url' => $one,
            ]);

        }

        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-main-file.php', [
            'siteMapUrls' => $siteMapUrls,
        ]);

        // Создаем файл
        $fileName = 'sitemap_all.xml';
        //(new \common\components\dump\Dump())->printR($siteMap->realPath());
        //(new \common\components\dump\Dump())->printR($gii->realPath() . '/frontend/views/gii/sitemap/');die;

        $gii->generateFile($siteMapContent, $fileName, $gii->realPath() . '/frontend/views/gii/sitemap/');

        unset($siteMapContent);
        unset($siteMapUrls);
        unset($countLimit);
        unset($fileName);
        $siteMapContent = '';
        $siteMapUrls = '';
        $fileName = '';
        $countLimit = 0;

    }

}
