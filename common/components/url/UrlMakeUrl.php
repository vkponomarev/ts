<?php

namespace common\components\url;


use Yii;
use yii\web\NotFoundHttpException;




class UrlMakeUrl
{

    private $tableName;
    private $tableTextName;
    private $nameField;
    private $data;

    function __construct($params)
    {
        $this->tableName = $params['tableName'];
        $this->nameField = $params['fieldName'];
        $this->data = (new UrlMakeUrlLoadData($this->tableName, $this->nameField))->data;
        (new UrlMakeUrlUpdate($this->tableName, $this->nameField, $this->data));
    }



}
