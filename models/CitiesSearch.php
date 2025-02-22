<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cities;

/**
 * CitiesSearch represents the model behind the search form of `app\models\Cities`.
 */
class CitiesSearch extends Cities
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'province_id', 'postal_code'], 'integer'],
            [['province', 'type', 'city_name'], 'safe'],
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
        $query = Cities::find();

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
            'city_id' => $this->city_id,
            'province_id' => $this->province_id,
            'postal_code' => $this->postal_code,
        ]);

        $query->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'city_name', $this->city_name]);

        return $dataProvider;
    }
}
