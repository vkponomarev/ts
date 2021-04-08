<?php

namespace common\components\translations;


use Yii;
use yii\web\NotFoundHttpException;




class TranslationsAddEng
{

    private $tableName;
    private $nameField;
    private $data;

    function __construct($params)
    {

        $this->tableName = $params['tableName'];
        $this->nameField = $params['fieldName'];
        $this->data = (new TranslationsAddEngLoadData($this->tableName, $this->nameField))->data;
        (new TranslationsAddEngInsert($this->tableName, $this->nameField, $this->data));
    }



}
