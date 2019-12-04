<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServicePrice;

/**
 * ServicePriceSearch represents the model behind the search form of `app\models\ServicePrice`.
 */
class ServicePriceSearch extends ServicePrice
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'is_little', 'is_medium', 'is_large', 'is_active', 'created_by', 'last_updated_by'], 'integer'],
            [['model'], 'safe'],
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
        $query = ServicePrice::find();

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
            'sector_id' => $this->sector_id,
            'is_little' => $this->is_little,
            'is_medium' => $this->is_medium,
            'is_large' => $this->is_large,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'last_updated_by' => $this->last_updated_by,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model]);

        return $dataProvider;
    }
}
