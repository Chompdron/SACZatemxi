<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PedidoProvLista;

/**
 * PedidoProvListaSearch represents the model behind the search form of `app\models\PedidoProvLista`.
 */
class PedidoProvListaSearch extends PedidoProvLista
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PedidoProvListaID', 'PedidoProvID', 'InsumoID'], 'integer'],
            [['Cantidad', 'ImportePorPieza'], 'number'],
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
        $query = PedidoProvLista::find();

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
            'PedidoProvListaID' => $this->PedidoProvListaID,
            'PedidoProvID' => $this->PedidoProvID,
            'InsumoID' => $this->InsumoID,
            'Cantidad' => $this->Cantidad,
            'ImportePorPieza' => $this->ImportePorPieza,
        ]);

        return $dataProvider;
    }
}
