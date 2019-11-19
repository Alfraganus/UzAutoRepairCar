<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProblemMonitorings;

/**
 * ProblemMonitoringsSearch represents the model behind the search form of `app\models\ProblemMonitorings`.
 */
class ProblemMonitoringsSearch extends ProblemMonitorings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sector', 'department', 'spent_on', 'user_id'], 'integer'],
            [['shift', 'date', 'model', 'PO', 'problem', 'comment', 'winno', 'created_at'], 'safe'],
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
        $query = ProblemMonitorings::find();

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
            'sector' => $this->sector,
            'date' => $this->date,
            'department' => $this->department,
            'spent_on' => $this->spent_on,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'shift', $this->shift])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'PO', $this->PO])
            ->andFilterWhere(['like', 'problem', $this->problem])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'winno', $this->winno]);

        return $dataProvider;
    }
}
