<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JangkaWaktu;

/**
 * JangkaWaktuSearch represents the model behind the search form of `app\models\JangkaWaktu`.
 */
class JangkaWaktuSearch extends JangkaWaktu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idjangka'], 'integer'],
            [['jangka'], 'safe'],
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
        $query = JangkaWaktu::find();

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
            'idjangka' => $this->idjangka,
        ]);

        $query->andFilterWhere(['like', 'jangka', $this->jangka]);

        return $dataProvider;
    }
}
