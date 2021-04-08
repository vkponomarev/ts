<?php

namespace common\components\translations;


use Yii;


class TranslationsAddEngInsert
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
            (name, name_in, name_for, ' . $tableName . '_id, languages_id)
            values
            ("' . $item[$fieldName] . '", "in ' . $item[$fieldName] . '", "for ' . $item[$fieldName] . '", '. $item['id'] . ', 2)
            ')
                ->execute();
        }

    }

}
