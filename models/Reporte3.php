<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporte3".
 *
 * @property int $PedidoID
 * @property int $ProductoID
 * @property bool $Status
 */
class Reporte3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reporte3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PedidoID', 'ProductoID'], 'integer'],
            [['ProductoID'], 'required'],
            [['Status'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PedidoID' => 'Pedido ID',
            'ProductoID' => 'Producto ID',
            'Status' => 'Status',
        ];
    }
}
