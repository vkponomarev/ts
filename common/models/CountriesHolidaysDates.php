<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "countries_holidays_dates".
 *
 * @property int $id
 * @property int $countries_id
 * @property int $holidays_id
 * @property int $year
 * @property string|null $date
 */
class CountriesHolidaysDates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries_holidays_dates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countries_id', 'holidays_id', 'year'], 'required'],
            [['countries_id', 'holidays_id', 'year'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countries_id' => 'Countries ID',
            'holidays_id' => 'Holidays ID',
            'year' => 'Year',
            'date' => 'Date',
        ];
    }
}
