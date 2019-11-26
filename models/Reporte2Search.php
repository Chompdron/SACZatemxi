<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;
use app\models\Reporte2Search;


/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class Reporte2Search extends Reporte2
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
             [['InsumoID', 'ProveedorID'], 'integer'],
            
            [['Fecha'], 'safe'],
            [['Descripcion', 'NombreComercial'], 'string', 'max' => 256],
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
        $query = Reporte2::find();

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
            'ProveedorID' => $this->ProveedorID,
            'Descripcion' => $this->Fecha,
            'NombreComercial' => $this->NombreComercial,
            'Fecha' => $this->Fecha,
        ]);

        return $dataProvider;
    }
}
