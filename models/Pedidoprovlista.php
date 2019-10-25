<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidoprovlista".
 *
 * @property int $PedidoProvListaID
 * @property int $PedidoProvID
 * @property int $InsumoID
 * @property double $Cantidad
 * @property double $ImportePorPieza
 */
class Pedidoprovlista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidoprovlista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PedidoProvID', 'InsumoID', 'Cantidad', 'ImportePorPieza'], 'required'],
            [['PedidoProvID', 'InsumoID'], 'integer'],
            [['Cantidad', 'ImportePorPieza'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PedidoProvListaID' => 'Pedido Prov Lista ID',
            'PedidoProvID' => 'Pedido Prov ID',
            'InsumoID' => 'Insumo ID',
            'Cantidad' => 'Cantidad',
            'ImportePorPieza' => 'Importe Por Pieza',
        ];
    }
}
