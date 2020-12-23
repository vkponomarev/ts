<?php

namespace common\components\gii\giiPDF;


/**
 * Class GiiPDF
 * @package common\components\gii\giiPDF
 * Класс отвечающий за генерацию PDF календарей
 */
class GiiPDF
{

    function __construct()
    {

    }

    /**
     * Генерация всех PDF файлов.
     * @param $languagesData array
     */
    function generatePDF($languagesData){

        (new GiiPDFGeneratePDF())->generate($languagesData);

    }

    /**
     * Генерация PDF календаря на год
     * @param $languagesData
     * @throws \yii\base\InvalidConfigException
     */
    function generatePDFCalendarYearly($languagesData){

        (new GiiPDFGeneratePDFCalendarYearly())->generate($languagesData);

    }


}
