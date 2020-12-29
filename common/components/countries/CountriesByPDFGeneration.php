<?php

namespace common\components\countries;

use Yii;

/**
 * Выбираем все страны для PDF генерации календаря
 * Class CountriesByPDFGeneration
 * @package common\components\countries
 */
class CountriesByPDFGeneration
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
            countries.id,
            countries.url
            from
            countries
            ')
            ->queryAll();

        return $data;
    }
}

