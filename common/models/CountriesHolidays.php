<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "countries_holidays".
 *
 * @property int $id
 * @property int $countries_id
 * @property int $holidays_id
 * @property int $diff_dates
 * @property string|null $date
 * @property int $count_days_off
 * @property int $type
 */
class CountriesHolidays extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries_holidays';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countries_id', 'holidays_id', 'diff_dates', 'count_days_off', 'type'], 'required'],
            [['countries_id', 'holidays_id', 'diff_dates', 'count_days_off', 'type'], 'integer'],
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
            'diff_dates' => 'Diff Dates',
            'date' => 'Date',
            'count_days_off' => 'Count Days Off',
            'type' => 'Type',
        ];
    }
}
