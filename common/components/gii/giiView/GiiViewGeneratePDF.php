<?php

namespace common\components\gii\giiView;


use common\components\bigData\BigData;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\gii\view\View;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;

class GiiViewGeneratePDF
{


    function generate($languagesData)
    {
        $view = new View();
        $view->generatePagesIndex($languagesData);
    }

}
