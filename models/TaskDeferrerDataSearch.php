<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TaskDeferrerData;

/**
 * TaskDeferrerDataSearch represents the model behind the search form of `app\models\TaskDeferrerData`.
 */
class TaskDeferrerDataSearch extends TaskDeferrerData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'storage_id', 'defer_days'], 'integer'],
            [['text', 'date'], 'safe'],
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
        $query = TaskDeferrerData::find();

        // add conditions that should always apply here
        $query->andFilterWhere(['<=', 'date', date('Y-m-d')]);
        $query->orderBy(['date' => 'ASC']);

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
            'storage_id' => $this->storage_id,
            'date' => $this->date,
            'defer_days' => $this->defer_days,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
