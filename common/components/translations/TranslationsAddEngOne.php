<?php

namespace common\components\translations;


use Yii;
use yii\web\NotFoundHttpException;




class TranslationsAddEngOne
{

    private $tableName;
    private $nameField;
    private $data;

    function __construct($params)
    {

        $this->tableName = $params['tableName'];
        $this->nameField = $params['fieldName'];
        $this->data = (new TranslationsAddEngOneLoadData($this->tableName, $this->nameField))->data;
        (new TranslationsAddEngOneInsert($this->tableName, $this->nameField, $this->data));
    }



}
