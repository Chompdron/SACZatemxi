<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $ClienteID
 * @property string $NombreComercial
 * @property string $RazonSocial
 * @property string $RFC
 * @property string $Direccion
 * @property string $Telefono
 * @property string $HorarioEntrega
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreComercial', 'RazonSocial', 'RFC', 'Direccion', 'Telefono', 'HorarioEntrega'], 'required'],
            [['NombreComercial', 'RazonSocial', 'RFC', 'Direccion', 'HorarioEntrega'], 'string', 'max' => 256],
            [['Telefono'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ClienteID' => 'Cliente ID',
            'NombreComercial' => 'Nombre Comercial',
            'RazonSocial' => 'Razon Social',
            'RFC' => 'Rfc',
            'Direccion' => 'Direccion',
            'Telefono' => 'Telefono',
            'HorarioEntrega' => 'Horario Entrega',
        ];
    }
}
