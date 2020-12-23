<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "holidays_text".
 *
 * @property int $id
 * @property int $holidays_id
 * @property int $languages_id
 * @property string $title
 * @property string $h1
 * @property string $description
 * @property string $keywords
 * @property string $text1
 * @property string $text2
 * @property int $active
 */
class HolidaysText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holidays_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['holidays_id', 'languages_id', 'active'], 'integer'],
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
            'holidays_id' => 'Holidays ID',
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
