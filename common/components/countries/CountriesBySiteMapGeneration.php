<?php

namespace common\components\countries;

use Yii;

/**
 * Выбираем все страны для генерации карты сайта
 * Class CountriesBySiteMapGeneration
 * @package common\components\countries
 */
class CountriesBySiteMapGeneration
{

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function data()
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            countries.id
            from
            countries
            ')
            ->queryAll();

        return $data;
    }
}

