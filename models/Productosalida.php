<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productosalida".
 *
 * @property int $VentaID
 * @property string $Fecha
 * @property double $Total
 * @property double $Descuento
 * @property int $ClienteID
 * @property int $ProductoID
 * @property string $Nombre
 * @property int $Cantidad
 */
class Productosalida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productosalida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VentaID', 'ClienteID', 'ProductoID', 'Cantidad'], 'integer'],
            [['Fecha', 'Total', 'ClienteID', 'Nombre', 'Cantidad'], 'required'],
            [['Fecha'], 'safe'],
            [['Total', 'Descuento'], 'number'],
            [['Nombre'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'VentaID' => 'Venta ID',
            'Fecha' => 'Fecha',
            'Total' => 'Total',
            'Descuento' => 'Descuento',
            'ClienteID' => 'Cliente ID',
            'ProductoID' => 'Producto ID',
            'Nombre' => 'Nombre',
            'Cantidad' => 'Cantidad',
        ];
    }
}
