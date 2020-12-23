<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "holidays_date_type".
 *
 * @property int $id
 * @property int $holidays_date_id
 * @property int $holidays_type_id
 */
class HolidaysDateType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holidays_date_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['holidays_date_id', 'holidays_type_id'], 'required'],
            [['holidays_date_id', 'holidays_type_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'holidays_date_id' => 'Holidays Date ID',
            'holidays_type_id' => 'Holidays Type ID',
        ];
    }
}
