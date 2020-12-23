<?php

namespace common\components\gii\giiPDF;


use common\components\bigData\BigData;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\gii\view\View;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;

/**
 * Class GiiPDFGeneratePDF
 * @package common\components\gii\giiPDF
 * Класс для генерации всех PDF календарей одновременно
 */
class GiiPDFGeneratePDF
{

    /**
     * @param $languagesData array Массив всех активных языков
     */
    function generate($languagesData)
    {
        $view = new П();
        $view->generatePagesIndex($languagesData);
    }

}
