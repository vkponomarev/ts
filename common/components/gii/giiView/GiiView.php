<?php

namespace common\components\gii\giiView;


/**
 * Class View
 * @package common\components\gii\giiView
 * Класс для создания файлов
 * Генерация PDF календарей
 */
class View
{




    function __construct()
    {

    }

    /**
     * @param $path string Путь к чемуто
     * Создаем все PDF календари вместе
     */
    function generatePDF($path){

        (new ViewGeneratePDF())->generate($path);

    }

    function generatePDFCalendarYearly($valueOne, $valueTwo, $languagesData){

        (new ViewGeneratePDFCalendarYearly())->generate($valueOne, $valueTwo, $languagesData);

    }


    function cleanPath($path){

        (new ViewCleanPath())->clean($path);

    }

    function realPath(){

        return (new ViewRealPath())->realPath();

    }

    function generateFile($content, $fileName, $filePath){

        (new ViewGenerateFile())->generate($content, $fileName, $filePath);

    }

    function generateFileArray($array, $fileName, $filePath){

        (new ViewGenerateFileArray())->generate($array, $fileName, $filePath);

    }

}
