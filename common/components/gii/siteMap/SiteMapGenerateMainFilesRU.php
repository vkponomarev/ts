<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;
use common\components\gii\Gii;

class SiteMapGenerateMainFilesRU
{


    function generate()
    {

        $gii = new Gii();
        $dir = $gii->realPath();

        $siteMapListAll = array_slice(scandir($dir . '/frontend/views/gii/sitemap/'), 2);

        //(new \common\components\dump\Dump())->printR($siteMapListAll);die;

        $countLimit = 0;
        $countFiles = 0;
        $count = 0;
        $siteMapUrls = '';

        foreach ($siteMapListAll as $one) {

            if (strpos($one, '_ru_') !== false) {
                $siteMapUrls .= \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-main-file-urls.php', [
                    'url' => $one,
                ]);
            } else {
                continue;
            }

        }

        $siteMapContent = \Yii::$app->view->render('@common/components/gii/siteMap/templates/_sitemap-main-file.php', [
            'siteMapUrls' => $siteMapUrls,
        ]);

        // Создаем файл
        $fileName = 'sitemap_ru.xml';
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
