<?php

namespace common\components\translations;


use Yii;


class TranslationsAddEngOneInsert
{

    function __construct($tableName, $fieldName, $data)
    {

        $this->insert($tableName, $fieldName, $data);

    }

    function insert($tableName, $fieldName, $data)
    {

        foreach ($data as $item) {

            Yii::$app->db
                ->createCommand('
            insert into 
            ' . $tableName . '_text
            (' . $fieldName . ', ' . $tableName . '_id, languages_id)
            values
            ("' . $item[$fieldName] . '", '. $item['id'] . ', 2)
            ')
                ->execute();
        }

    }

}
