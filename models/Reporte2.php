<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporte2".
 *
 * @property int $InsumoID
 * @property string $Descripcion
 * @property int $ProveedorID
 * @property string $NombreComercial
 * @property string $Fecha
 */
class Reporte2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reporte2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['InsumoID', 'ProveedorID'], 'integer'],
            [['Descripcion', 'NombreComercial', 'Fecha'], 'required'],
            [['Fecha'], 'safe'],
            [['Descripcion', 'NombreComercial'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'InsumoID' => 'Insumo ID',
            'Descripcion' => 'Descripcion',
            'ProveedorID' => 'Proveedor ID',
            'NombreComercial' => 'Nombre Comercial',
            'Fecha' => 'Fecha',
        ];
    }
}
