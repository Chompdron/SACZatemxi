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
            [['InsumoID', 'Stock'], 'integer'],
            [['ProveedorID', 'Descripcion'], 'string'],
            [['UnidadPresentacionID'], 'safe'],
            [['PrecioXUnidad'], 'number'],
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
        $query = Insumo::find()->join('INNER JOIN',
                                      'Proveedor',
                                      'Insumo.ProveedorID = Proveedor.ProveedorID');
        $query->join('INNER JOIN',
                                      'UnidadPresentacion',
                                      'Insumo.UnidadPresentacionID = UnidadPresentacion.UnidadPresentacionID');

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
            'Stock' => $this->Stock,
            'PrecioXUnidad' => $this->PrecioXUnidad,
        ])->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);
        $query->andFilterWhere(['like', 'NombreComercial', $this->ProveedorID]);
        $query->andFilterWhere(['like', 'UnidadPresentacion.Nombre', $this->UnidadPresentacionID]);

        return $dataProvider;
    }
}
