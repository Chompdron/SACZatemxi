<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empleado;

/**
 * EmpleadoSearch represents the model behind the search form of `app\models\Empleado`.
 */
class EmpleadoSearch extends Empleado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmpleadoID', 'UserID'], 'integer'],
            [['HorasxSem', 'PagoxHrs'], 'number'],
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
        $query = Empleado::find();

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
            'EmpleadoID' => $this->EmpleadoID,
            'HorasxSem' => $this->HorasxSem,
            'PagoxHrs' => $this->PagoxHrs,
            'UserID' => $this->UserID,
        ]);

        return $dataProvider;
    }
}
