<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venta;

/**
 * VentaSearch represents the model behind the search form of `app\models\Venta`.
 */
class VentaSearch extends Venta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VentaID'], 'integer'],
            [['Fecha'], 'safe'],
            [['ClienteID'], 'string'],
            [['Total', 'Descuento'], 'number'],
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
        $query = Venta::find()->join('INNER JOIN',
                                      'Cliente',
                                      'Venta.ClienteID = Cliente.ClienteID');

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
            'Fecha' => $this->Fecha,
            'Total' => $this->Total,
            'Descuento' => $this->Descuento,
        ])->andFilterWhere(['like', 'NombreComercial', $this->ClienteID]);

        return $dataProvider;
    }
}
