<?php

namespace kouosl\izin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use kouosl\izin\models\Izin;

/**
 * IzinSearch represents the model behind the search form of `kouosl\izin\models\Izin`.
 */
class IzinSearch extends Izin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phone_number'], 'integer'],
            [['starting_date', 'end_date', 'address', 'status', 'mail_address'], 'safe'],
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
        $query = Izin::find();

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
            'starting_date' => $this->starting_date,
            'end_date' => $this->end_date,
            'phone_number' => $this->phone_number,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'mail_address', $this->mail_address]);

        return $dataProvider;
    }
}
