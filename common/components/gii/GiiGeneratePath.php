<?php

namespace common\components\gii;

/**
 * Создаем папу если она не создана.
 * Class GiiGeneratePath
 * @package common\components\gii
 */
class GiiGeneratePath
{

    /**
     * Создаем папку если она не создана
     * @param $filePath string Полный путь для папки которую нужно создать.
     */
    function generate($filePath)
    {

        //(new \common\components\dump\Dump())->printR($filePath . $fileName);

        if (!is_dir($filePath)) {

            mkdir($filePath, 0755, true);

        }


    }

}
