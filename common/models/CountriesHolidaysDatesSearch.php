<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CountriesHolidaysDates;

/**
 * CountriesHolidaysDatesSearch represents the model behind the search form of `common\models\CountriesHolidaysDates`.
 */
class CountriesHolidaysDatesSearch extends CountriesHolidaysDates
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'countries_id', 'holidays_id', 'year'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CountriesHolidaysDates::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'countries_id' => $this->countries_id,
            'holidays_id' => $this->holidays_id,
            'year' => $this->year,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
