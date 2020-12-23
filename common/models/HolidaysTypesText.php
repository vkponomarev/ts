<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "holidays_types_text".
 *
 * @property int $id
 * @property int $holidays_types_id
 * @property int $languages_id
 * @property string $title
 * @property string $h1
 * @property string $description
 * @property string|null $keywords
 * @property string|null $text1
 * @property string|null $text2
 * @property int $active
 */
class HolidaysTypesText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holidays_types_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['holidays_types_id', 'languages_id', 'active'], 'integer'],
            [['description', 'text1', 'text2'], 'string'],
            [['title', 'h1', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'holidays_types_id' => 'Holidays Types ID',
            'languages_id' => 'Languages ID',
            'title' => 'Title',
            'h1' => 'H1',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'text1' => 'Text1',
            'text2' => 'Text2',
            'active' => 'Active',
        ];
    }
}
