<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidadpresentacion".
 *
 * @property int $UnidadPresentacionID
 * @property string $Nombre
 * @property double $cantidadMlGInd
 */
class Unidadpresentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidadpresentacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'cantidadMlGInd'], 'required'],
            [['cantidadMlGInd'], 'number'],
            [['Nombre'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UnidadPresentacionID' => 'Unidad de Presentacion',
            'Nombre' => 'Nombre',
            'cantidadMlGInd' => 'Cantidad en ml/g/unidad',
        ];
    }
}
