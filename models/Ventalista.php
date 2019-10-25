<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventalista".
 *
 * @property int $DetVentaID
 * @property int $VentaID
 * @property int $ProductoID
 * @property int $Cantidad
 * @property double $PrecioVenta
 */
class Ventalista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventalista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VentaID', 'ProductoID', 'Cantidad', 'PrecioVenta'], 'required'],
            [['VentaID', 'ProductoID', 'Cantidad'], 'integer'],
            [['PrecioVenta'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DetVentaID' => 'Det Venta ID',
            'VentaID' => 'Venta ID',
            'ProductoID' => 'Producto ID',
            'Cantidad' => 'Cantidad',
            'PrecioVenta' => 'Precio Venta',
        ];
    }
}
