<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property int $ProveedorID
 * @property string $NombreComercial
 * @property string $RazonSocial
 * @property string $RFC
 * @property string $Telefono
 * @property string $CorreoElectronico
 * @property string $Direccion
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreComercial', 'RazonSocial', 'RFC', 'Telefono', 'CorreoElectronico', 'Direccion'], 'required'],
            [['NombreComercial', 'RazonSocial', 'RFC', 'CorreoElectronico', 'Direccion'], 'string', 'max' => 256],
            [['Telefono'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ProveedorID' => 'Proveedor',
            'NombreComercial' => 'Nombre Comercial',
            'RazonSocial' => 'Razón Social',
            'RFC' => 'RFC',
            'Telefono' => 'Teléfono',
            'CorreoElectronico' => 'Correo Electrónico',
            'Direccion' => 'Dirección',
        ];
    }
}
