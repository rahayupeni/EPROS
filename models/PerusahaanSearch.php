<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Perusahaan;

/**
 * PerusahaanSearch represents the model behind the search form of `app\models\Perusahaan`.
 */
class PerusahaanSearch extends Perusahaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idperusahaan'], 'integer'],
            [['nama', 'phone', 'alamat', 'usia', 'cabang', 'gambar', 'latitude', 'longitude', 'iduser', 'acara', 'menerima', 'jangka_waktu', 'sponsor', 'timbal_balik', 'bukti'], 'safe'],
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
        $query = Perusahaan::find();

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
            'idperusahaan' => $this->idperusahaan,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'usia', $this->usia])
            ->andFilterWhere(['like', 'cabang', $this->cabang])
            ->andFilterWhere(['like', 'gambar', $this->gambar])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'iduser', $this->iduser])
            ->andFilterWhere(['like', 'acara', $this->acara])
            ->andFilterWhere(['like', 'menerima', $this->menerima])
            ->andFilterWhere(['like', 'jangka_waktu', $this->jangka_waktu])
            ->andFilterWhere(['like', 'sponsor', $this->sponsor])
            ->andFilterWhere(['like', 'timbal_balik', $this->timbal_balik])
            ->andFilterWhere(['like', 'bukti', $this->bukti]);

        return $dataProvider;
    }
}
