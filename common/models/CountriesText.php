<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "countries_text".
 *
 * @property int $id
 * @property int $countries_id
 * @property int $languages_id
 * @property string $title
 * @property string $h1
 * @property string $description
 * @property string $keywords
 * @property string $text1
 * @property string $text2
 * @property int $active
 */
class CountriesText extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries_text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countries_id', 'languages_id', 'active'], 'integer'],
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
            'countries_id' => 'Countries ID',
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
