<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receta".
 *
 * @property int $RecetaID
 * @property int $ProductoID
 * @property int $InsumoID
 * @property double $Cantidad
 */
class Receta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ProductoID', 'InsumoID', 'Cantidad'], 'required'],
            [['ProductoID', 'InsumoID'], 'integer'],
            [['Cantidad'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'RecetaID' => 'Receta ID',
            'ProductoID' => 'Producto ID',
            'InsumoID' => 'Insumo ID',
            'Cantidad' => 'Cantidad',
        ];
    }
}
