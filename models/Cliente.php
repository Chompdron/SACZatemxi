<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $ClienteID
 * @property string $NombreComercial
 * @property string $RazonSocial
 * @property int $TipoClienteID
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
            [['NombreComercial', 'RazonSocial', 'TipoClienteID', 'RFC', 'Direccion', 'Telefono', 'HorarioEntrega'], 'required'],
            [['TipoClienteID'], 'integer'],
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
            'TipoClienteID' => 'Tipo Cliente ID',
            'RFC' => 'Rfc',
            'Direccion' => 'Direccion',
            'Telefono' => 'Telefono',
            'HorarioEntrega' => 'Horario Entrega',
        ];
    }
}
