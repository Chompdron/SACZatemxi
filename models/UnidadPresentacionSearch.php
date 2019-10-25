<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnidadPresentacion;

/**
 * UnidadPresentacionSearch represents the model behind the search form of `app\models\UnidadPresentacion`.
 */
class UnidadPresentacionSearch extends UnidadPresentacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UnidadPresentacionID'], 'integer'],
            [['Nombre'], 'safe'],
            [['cantidadMlGInd'], 'number'],
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
        $query = UnidadPresentacion::find();

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
            'UnidadPresentacionID' => $this->UnidadPresentacionID,
            'cantidadMlGInd' => $this->cantidadMlGInd,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre]);

        return $dataProvider;
    }
}
