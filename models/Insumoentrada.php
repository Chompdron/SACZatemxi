<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "insumoentrada".
 *
 * @property int $PedidoProvID
 * @property int $ProveedorID
 * @property string $Fecha
 * @property double $Total
 * @property int $InsumoID
 * @property string $Descripcion
 * @property double $Cantidad
 */
class Insumoentrada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'insumoentrada';
    }

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
    public function attributeLabels()
    {
        return [
            'PedidoProvID' => '# Pedido a Proveedor',
            'ProveedorID' => 'Proveedor',
            'Fecha' => 'Fecha',
            'Total' => 'Total',
            'InsumoID' => 'Insumo',
            'Descripcion' => 'Descripción',
            'Cantidad' => 'Cantidad',
        ];
    }
}
