<?php

namespace common\components\url;


use Yii;


class UrlMakeUrlLoadData
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
