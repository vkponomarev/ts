<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "holidays_types".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $url
 * @property string $name
 * @property int $active
 */
class HolidaysTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holidays_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'url', 'name', 'active'], 'required'],
            [['parent_id', 'active'], 'integer'],
            [['url', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'url' => 'Url',
            'name' => 'Name',
            'active' => 'Active',
        ];
    }

    public function translateButtons($model){

        $text='';
        $allLanguages=ArrayHelper::map(Languages::getAllLanguages(),'id','url');
        $allLanguagesInverse=ArrayHelper::map(Languages::getAllLanguages(),'url','id');
        $onLanguages=ArrayHelper::map($model->languages,'url','id');
        $onPagesText=ArrayHelper::map($model->holidaysTypesTextId,'languages_id','id');

        foreach ($allLanguages as $one) {


            if (isset($onLanguages[$one])) {

                $text .= '<a class="btn btn-success" href="/holidays-types-text/update?id=' . $onPagesText[$onLanguages[$one]] . '&languages=' .$onLanguages[$one]. '&holidays-types=' .$model->id. '"><span class="fa fa-check"></span> ' . $one . ' </a> ';

            } else {

                $text .= '<a class="btn btn-primary" href="/holidays-types-text/create?languages=' . $allLanguagesInverse[$one] . '&holidays-types='. $model->id .'"><span class="fa fa-times"></span> ' . $one . ' </a> ';
            }

        }

        return $text;

    }


    public function getLanguages(){
        return $this->hasMany(Languages::className(),['id'=>'languages_id'])->via('holidaysTypesText');
    }

    public function getHolidaysTypesText(){
        return $this->hasMany(HolidaysTypesText::className(),['holidays_types_id'=>'id']);
    }


    public function getHolidaysTypesTextId(){
        return $this->hasMany(HolidaysTypesText::className(),['holidays_types_id'=>'id']);
    }






}
