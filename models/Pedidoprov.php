<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedidoprov".
 *
 * @property int $PedidoProvID
 * @property int $ProveedorID
 * @property string $Fecha
 * @property double $Total
 */
class Pedidoprov extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidoprov';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ProveedorID', 'Fecha', 'Total'], 'required'],
            [['ProveedorID'], 'integer'],
            [['Fecha'], 'safe'],
            [['Total'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PedidoProvID' => '# Pedido a Proveedor',
            'ProveedorID' => 'Proveedor',
            'Fecha' => 'Fecha',
            'Total' => 'Total',
        ];
    }

    public function getProveedor(){
        return $this->hasOne(Proveedor::className(),['ProveedorID'=>'ProveedorID']);  
    }
    
}
