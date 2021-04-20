<?php

namespace common\components\translations;


use Yii;


class TranslationsAddEngOneLoadData
{

    public $data;

    function __construct($tableName, $fieldName)
    {

        return $this->data($tableName, $fieldName);

    }


    function data($tableName, $fieldName)
    {

        $this->data = Yii::$app->db
            ->createCommand('
            select
            id,
            ' . $fieldName . '
            from
            ' . $tableName . '
            ')
            ->queryAll();

        return $this;

    }

}
