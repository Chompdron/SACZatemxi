<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $ProductoID
 * @property string $Nombre
 * @property double $Cantidad
 * @property double $Precio
 * @property int $Stock
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Cantidad', 'Precio', 'Stock'], 'required'],
            [['Cantidad', 'Precio'], 'number'],
            [['Stock'], 'integer'],
            [['Nombre'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ProductoID' => 'Producto ID',
            'Nombre' => 'Nombre',
            'Cantidad' => 'Cantidad',
            'Precio' => 'Precio',
            'Stock' => 'Stock',
        ];
    }
}
