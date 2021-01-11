<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $active
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'active'], 'required'],
            [['active'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'url' => 'Url',
            'active' => 'Active',
        ];
    }

    public function translateButtons($model){

        $text='';
        $allLanguages=ArrayHelper::map(Languages::getAllLanguages(),'id','url');
        $allLanguagesInverse=ArrayHelper::map(Languages::getAllLanguages(),'url','id');
        $onLanguages=ArrayHelper::map($model->languages,'url','id');
        $onPagesText=ArrayHelper::map($model->countriesTextId,'languages_id','id');

        foreach ($allLanguages as $one) {


            if (isset($onLanguages[$one])) {

                $text .= '<a class="btn btn-success" href="/countries-text/update?id=' . $onPagesText[$onLanguages[$one]] . '&languages=' .$onLanguages[$one]. '&countries=' .$model->id. '"><span class="fa fa-check"></span> ' . $one . ' </a> ';

            } else {

                $text .= '<a class="btn btn-primary" href="/countries-text/create?languages=' . $allLanguagesInverse[$one] . '&countries='. $model->id .'"><span class="fa fa-times"></span> ' . $one . ' </a> ';
            }

        }

        return $text;

    }


    public function getLanguages(){
        return $this->hasMany(Languages::className(),['id'=>'languages_id'])->via('countriesText');
    }

    public function getCountriesText(){
        return $this->hasMany(CountriesText::className(),['countries_id'=>'id']);
    }


    public function getCountriesTextId(){
        return $this->hasMany(CountriesText::className(),['countries_id'=>'id']);
    }




}
