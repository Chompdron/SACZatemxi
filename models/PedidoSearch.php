<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pedido;

/**
 * PedidoSearch represents the model behind the search form of `app\models\Pedido`.
 */
class PedidoSearch extends Pedido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PedidoID'], 'integer'],
            [['UnidadXLote'], 'number'],
            [['ProductoID'], 'string'],
            [['FechaInicio', 'FechaFin', 'FechaStatusFin'], 'safe'],
            [['Status'], 'boolean'],
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
        $query = Pedido::find()->join('INNER JOIN',
                                      'Producto',
                                      'Pedido.ProductoID = Producto.ProductoID');

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
            'PedidoID' => $this->PedidoID,
            'UnidadXLote' => $this->UnidadXLote,
            'FechaInicio' => $this->FechaInicio,
            'FechaFin' => $this->FechaFin,
            'Status' => $this->Status,
            'FechaStatusFin' => $this->FechaStatusFin,
        ])->andFilterWhere(['like', 'Nombre', $this->ProductoID]);

        return $dataProvider;
    }
}
