<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Receta;

/**
 * RecetaSearch represents the model behind the search form of `app\models\Receta`.
 */
class RecetaSearch extends Receta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RecetaID', 'ProductoID'], 'integer'],
            [['Cantidad'], 'number'],
            [['InsumoID'], 'string'],
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
        $query = Receta::find()->join('INNER JOIN',
                                      'Insumo',
                                      'Receta.InsumoID = Insumo.InsumoID');

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
            'RecetaID' => $this->RecetaID,
            'InsumoID' => $this->InsumoID,
            'Cantidad' => $this->Cantidad,
        ])->andFilterWhere(['like', 'Descripcion', $this->ProductoID]);
        
        return $dataProvider;
    }
}
