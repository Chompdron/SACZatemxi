<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $PedidoID
 * @property int $ProductoID
 * @property double $UnidadXLote
 * @property string $FechaInicio
 * @property string $FechaFin
 * @property bool $Status
 * @property string $FechaStatusFin
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ProductoID', 'UnidadXLote', 'FechaInicio', 'FechaFin', 'FechaStatusFin'], 'required'],
            [['ProductoID'], 'integer'],
            [['UnidadXLote'], 'number'],
            [['FechaInicio', 'FechaFin', 'FechaStatusFin'], 'safe'],
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
            'UnidadXLote' => 'Unidad X Lote',
            'FechaInicio' => 'Fecha Inicio',
            'FechaFin' => 'Fecha Fin',
            'Status' => 'Status',
            'FechaStatusFin' => 'Fecha Status Fin',
        ];
    }

      /**
    * @return \yii\db\ActiveQuery
    */
    public function getProducto(){
        return $this->hasOne(Producto::className(),['ProductoID'=>'ProductoID'])->one();  
      }

    public function getInsumos(){
        $producto = $this->hasOne(Producto::className(),['ProductoID'=>'ProductoID'])->one(); 
        return $receta = $this->hasOne(Receta::className(),['ProductoID'=>'ProductoID'])->all();
        
    }
}
