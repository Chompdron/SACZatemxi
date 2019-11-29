<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "reporte".
 *
 * @property int $VentaID
 * @property string $Fecha
 * @property double $Total
 * @property double $Descuento
 * @property int $ClienteID
 * @property string $NombreComercial
 * @property string $RazonSocial
 */
class Reporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VentaID', 'ClienteID'], 'integer'],
            [['Fecha', 'Total', 'ClienteID', 'NombreComercial', 'RazonSocial'], 'required'],
            [['Fecha'], 'safe'],
            [['Total', 'Descuento'], 'number'],
            [['NombreComercial', 'RazonSocial'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'VentaID' => '# Venta',
            'Fecha' => 'Fecha',
            'Total' => 'Total',
            'Descuento' => 'Descuento',
            'ClienteID' => 'Cliente',
            'NombreComercial' => 'Nombre Comercial',
            'RazonSocial' => 'Razón Social',
        ];
    }
      
}
