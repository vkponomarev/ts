<?php

namespace common\components\gii;

/**
 * Класс вспомогоательных функций для генерации файлов
 * Class Gii
 * @package common\components\gii
 */
class Gii
{

    /**
     * @param $path string Очищает папку с определенным путем
     */
    function cleanPath($path){

        (new GiiCleanPath())->clean($path);

    }

    /**
     * @return string Возвращает путь до корня сайта
     */
    function realPath(){

        return (new GiiRealPath())->realPath();

    }

    /**
     * Создаем папку если она не была создана
     * @param $path string Полный путь до папки.
     */
    function generatePath($path){

        (new GiiGeneratePath())->generate($path);

    }


    /**
     * @param $content string Сгенерированный текст для файла
     * @param $fileName string Название файла
     * @param $filePath string Путь файла
     */
    function generateFile($content, $fileName, $filePath){

        (new GiiGenerateFile())->generate($content, $fileName, $filePath);

    }

    /**
     * @param $array array Массив с какими либо данными для сохрания в файл
     * @param $fileName string Название файла
     * @param $filePath string Путь файла
     */
    function generateFileArray($array, $fileName, $filePath){

        (new GiiGenerateFileArray())->generate($array, $fileName, $filePath);

    }

    /**
     * Вызываем контроллер для каких либо действий.
     * Здесь это генерация PDF файлов.
     * @param $params array Массив с параметрами.
     * @param $namespace string неймспейс контроллера.
     * @param $controller string наименование контроллера.
     * @throws \yii\base\InvalidConfigException
     */
    function makeAction($params, $namespace, $controller){

        (new GiiMakeAction())->action($params, $namespace, $controller);

    }


}
