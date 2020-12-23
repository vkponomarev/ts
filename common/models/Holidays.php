<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "holidays".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $url
 * @property string $name
 * @property int $active
 * @property string $date
 * @property int $type
 */
class Holidays extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holidays';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'active', 'type'], 'integer'],
            [['date'], 'safe'],
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
            'date' => 'Date',
            'type' => 'Type',
        ];
    }



    public function translateButtons($model){

        $text='';
        $allLanguages=ArrayHelper::map(Languages::getAllLanguages(),'id','url');
        $allLanguagesInverse=ArrayHelper::map(Languages::getAllLanguages(),'url','id');
        $onLanguages=ArrayHelper::map($model->languages,'url','id');
        $onPagesText=ArrayHelper::map($model->holidaysTextId,'languages_id','id');
        foreach ($allLanguages as $one) {


            if (isset($onLanguages[$one])) {

                $text .= '<a class="btn btn-success" href="/holidays-text/update?id=' . $onPagesText[$onLanguages[$one]] . '&languages=' .$onLanguages[$one]. '&holidays=' .$model->id. '"><span class="fa fa-check"></span> ' . $one . ' </a> ';

            } else {

                $text .= '<a class="btn btn-primary" href="/holidays-text/create?languages=' . $allLanguagesInverse[$one] . '&holidays='. $model->id .'"><span class="fa fa-times"></span> ' . $one . ' </a> ';
            }

        }

        return $text;

    }


    public function getLanguages(){
        return $this->hasMany(Languages::className(),['id'=>'languages_id'])->via('holidaysText');
    }

    public function getHolidaysText(){
        return $this->hasMany(HolidaysText::className(),['holidays_id'=>'id']);
    }


    public function getHolidaysTextId(){
        return $this->hasMany(HolidaysText::className(),['holidays_id'=>'id']);
    }










}
