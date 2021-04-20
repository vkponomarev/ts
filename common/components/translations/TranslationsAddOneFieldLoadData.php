<?php

namespace common\components\translations;


use Yii;


class TranslationsAddOneFieldLoadData
{

    public $data;

    function __construct($tableName, $fieldName, $limitStart, $limitEnd)
    {

        return $this->data($tableName, $fieldName, $limitStart, $limitEnd);

    }


    function data($tableName, $fieldName, $limitStart, $limitEnd)
    {

        $this->data = Yii::$app->db
            ->createCommand('
            select
            ' . $tableName . '.id,
            text.' . $fieldName . '
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
