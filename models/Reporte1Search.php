<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;
use app\models\Reporte1Search;


/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class Reporte1Search extends Reporte1
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DetVentaID', 'VentaID', 'ProductoID', 'Cantidad'], 'integer'],
            [['VentaID', 'ProductoID', 'Cantidad', 'PrecioVenta', 'Fecha'], 'required'],
            [['PrecioVenta'], 'number'],
            [['Fecha'], 'safe'],
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
        $query = Reporte::find();

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
            'DetVentaID' => $this->DetVentaID,
            'VentaID' => $this->VentaID,
            'ProductoID' => $this->ProductoID,
            'Cantidad' => $this->Cantidad,
            'PrecioVenta' => $this->PrecioVenta,
            'Fecha' => $this->Fecha,
        ]);

        return $dataProvider;
    }
}
