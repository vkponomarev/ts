<?php

namespace common\components\translations;


use Yii;
use yii\web\NotFoundHttpException;




class TranslationsAddOneField
{

    private $tableName;
    private $fieldName;
    private $data;

    private $start;
    private $end;

    private $languages;

    function __construct($params)
    {

        $this->start = $params['limitStart'];
        $this->end = $params['limitEnd'];
        $this->tableName = $params['tableName'];
        $this->fieldName = $params['fieldName'];
        $this->languages = $this->languages();
        //Загружаем основные данные английского языка, с которого будем переводить на другие языки.
        $this->data = (new TranslationsAddOneFieldLoadData($this->tableName, $this->fieldName, $this->start, $this->end))->data;
        (new TranslationsAddOneFieldDo($this->tableName, $this->fieldName, $this->data, $this->languages, $this->start));

        //(new TranslationsAddEngInsert($this->tableName, $this->nameField, $this->data));
    }

    function languages()
    {
        $languages = Yii::$app->db
            ->createCommand('
            SELECT
            *
            FROM languages
            where active = 1
            ')
            ->queryAll();

        return $languages;
    }

}
