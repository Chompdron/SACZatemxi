<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;
use app\models\ReporteSearch;


/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class ReporteSearch extends Reporte
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VentaID', 'ClienteID'], 'integer'],
            [['Fecha'], 'safe'],
            [['Total', 'Descuento'], 'number'],
            [['NombreComercial', 'RazonSocial'], 'string', 'max' => 256],
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
            'VentaID' => $this->VentaID,
            'ClienteID' => $this->ClienteID,
            'Fecha' => $this->Fecha,
            'Total' => $this->Total,
            'NombreComercial' => $this->NombreComercial,
            'RazonSocial' => $this->RazonSocial,
            'Descuento' => $this->Descuento,
        ]);

        return $dataProvider;
    }
}
