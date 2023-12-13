<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClipboardCopierData;

/**
 * ClipboardCopierDataSearch represents the model behind the search form of `app\models\ClipboardCopierData`.
 */
class ClipboardCopierDataSearch extends ClipboardCopierData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'storage_id'], 'integer'],
            [['name', 'value'], 'safe'],
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
        $query = ClipboardCopierData::find();

        // add conditions that should always apply here
        $query->orderBy(['name' => 'ASC']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
