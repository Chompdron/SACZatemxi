<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Insumo;

/**
 * InsumoSearch represents the model behind the search form of `app\models\Insumo`.
 */
class InsumoSearch extends Insumo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['InsumoID', 'UnidadPresentacionID'], 'integer'],
            [['Descripcion'], 'safe'],
            [['Stock', 'PrecioXUnidad'], 'number'],
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
        $query = Insumo::find();

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
            'InsumoID' => $this->InsumoID,
            'UnidadPresentacionID' => $this->UnidadPresentacionID,
            'Stock' => $this->Stock,
            'PrecioXUnidad' => $this->PrecioXUnidad,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
