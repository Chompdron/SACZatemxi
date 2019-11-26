<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientesmascompradores".
 *
 * @property string $NombreComercial
 * @property int $Ventas
 */
class Clientesmascompradores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientesmascompradores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreComercial'], 'required'],
            [['Ventas'], 'integer'],
            [['NombreComercial'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NombreComercial' => 'Nombre Comercial',
            'Ventas' => 'Ventas',
        ];
    }
}
