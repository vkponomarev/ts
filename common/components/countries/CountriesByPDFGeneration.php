<?php

namespace common\components\countries;

use Yii;

/**
 * Class CountriesByPDFGeneration
 * @package common\components\countries
 * Выбираем все страны для PDF генерации календаря
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
            countries.id
            from
            countries
            ')
            ->queryAll();

        return $data;
    }
}

