<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Insumo;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class InsumoSalidaSearch extends InsumoSalida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
       return [
            [['InsumoID'], 'integer'],
            [['FechaInicio', 'UnidadXLote'], 'string'],
            [['FechaInicio'], 'safe'],
            [['UnidadXLote'], 'number'],
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
        $query = InsumoSalida::find();

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
            'FechaInicio' => $this->FechaInicio,
            'UnidadXLote' => $this->UnidadXLote,
        ]);

        $query->andFilterWhere(['like', 'InsumoID', $this->InsumoID]);

        return $dataProvider;
    }
}
