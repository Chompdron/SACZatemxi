<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporte1".
 *
 * @property int $DetVentaID
 * @property int $VentaID
 * @property int $ProductoID
 * @property int $Cantidad
 * @property double $PrecioVenta
 * @property string $Fecha
 */
class Reporte1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reporte1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DetVentaID', 'VentaID', 'ProductoID', 'Cantidad'], 'integer'],
            [['VentaID', 'ProductoID', 'Cantidad', 'PrecioVenta', 'Fecha'], 'required'],
            [['PrecioVenta'], 'number'],
            [['Fecha'], 'safe'],
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
            'Fecha' => 'Fecha',
        ];
    }
}
