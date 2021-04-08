<?php

namespace common\components\translations;


use Yii;


class TranslationsAddAllLoadData
{

    public $data;

    function __construct($tableName, $limitStart, $limitEnd)
    {

        return $this->data($tableName, $limitStart, $limitEnd);

    }


    function data($tableName, $limitStart, $limitEnd)
    {

        $this->data = Yii::$app->db
            ->createCommand('
            select
            ' . $tableName . '.id,
            text.name,
            text.name_in,
            text.name_for
            from
            ' . $tableName . '
            left join ' . $tableName . '_text as text on ' . $tableName . '.id = text.' . $tableName . '_id
            where
            text.languages_id = 2
            limit ' . $limitStart . ', ' . $limitEnd . ';
            ')
            ->queryAll();


        return $this;

    }

}
