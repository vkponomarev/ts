<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "holidays_data_main".
 *
 * @property int $id
 * @property string $countrys_name
 * @property string $holidays_year
 * @property string $day_number
 * @property string $month_name
 * @property string $day_name
 * @property string $link
 * @property string $holidays_name
 * @property string $holidays_type
 * @property string $holidays_region
 * @property int $observed
 * @property int $countries_id
 * @property int $month
 * @property int $week_day
 * @property int $month_day
 * @property int $year
 * @property int $holidays_id
 */
class HolidaysDataMain extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holidays_data_main';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countrys_name', 'holidays_year', 'day_number', 'month_name', 'day_name', 'link', 'holidays_name', 'holidays_type', 'holidays_region', 'observed', 'countries_id', 'month', 'week_day', 'month_day', 'year', 'holidays_id'], 'required'],
            [['countrys_name', 'holidays_year', 'day_number', 'month_name', 'day_name', 'link', 'holidays_name', 'holidays_type', 'holidays_region'], 'string'],
            [['observed', 'countries_id', 'month', 'week_day', 'month_day', 'year', 'holidays_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countrys_name' => 'Countrys Name',
            'holidays_year' => 'Holidays Year',
            'day_number' => 'Day Number',
            'month_name' => 'Month Name',
            'day_name' => 'Day Name',
            'link' => 'Link',
            'holidays_name' => 'Holidays Name',
            'holidays_type' => 'Holidays Type',
            'holidays_region' => 'Holidays Region',
            'observed' => 'Observed',
            'countries_id' => 'Countries ID',
            'month' => 'Month',
            'week_day' => 'Week Day',
            'month_day' => 'Month Day',
            'year' => 'Year',
            'holidays_id' => 'Holidays ID',
        ];
    }
}
