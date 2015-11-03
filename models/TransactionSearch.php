<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaction;

/**
 * TransactionSearch represents the model behind the search form about `app\models\Transaction`.
 */
class TransactionSearch extends Transaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_by', 'product_id', 'quantity', 'client_id', 'head_id'], 'integer'],
            [['amount'], 'number'],
            [['type', 'initial', 'create_time', 'duration', 'from_date', 'to_date', 'remarks'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Transaction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'amount' => $this->amount,
            'create_time' => $this->create_time,
            'create_by' => $this->create_by,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'client_id' => $this->client_id,
            'head_id' => $this->head_id,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'initial', $this->initial])
            ->andFilterWhere(['like', 'duration', $this->duration])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
