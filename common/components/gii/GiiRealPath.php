<?php

namespace common\components\gii;


use Yii;

/**
 * Class GiiRealPath
 * @package common\components\gii
 * Класс для вывода корня сайта
 */
class GiiRealPath
{
    /**
     * @return string Выводит путь к корню сайта
     */
    function realPath()
    {

        return realpath($_SERVER['DOCUMENT_ROOT'] . '/../../');

    }

}
