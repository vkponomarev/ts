<?php

namespace common\components\main;


use Yii;

/**
 * Класс для вывода корня сайта
 * Class GiiRealPath
 * @package common\components\main
 */
class MainPath
{
    /**
     * @return string Выводит путь к корню сайта
     */
    function path()
    {

        return realpath($_SERVER['DOCUMENT_ROOT'] . '/../../');

    }

}
