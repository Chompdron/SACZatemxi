<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Insumo;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class InsumoEntradaSearch extends InsumoEntrada
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
       return [
            [['PedidoProvID', 'ProveedorID', 'InsumoID'], 'integer'],
            [['ProveedorID', 'Fecha', 'Total', 'Descripcion', 'Cantidad'], 'required'],
            [['Fecha'], 'safe'],
            [['Total', 'Cantidad'], 'number'],
            [['Descripcion'], 'string', 'max' => 256],
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
        $query = ProductoSalida::find();

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
            'Cantidad' => $this->Cantidad,
            'Fecha' => $this->Fecha,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre]);

        return $dataProvider;
    }
}
