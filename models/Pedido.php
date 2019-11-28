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
 *
 * @property Producto $producto
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
            [['ProductoID'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['ProductoID' => 'ProductoID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PedidoID' => 'Pedido',
            'ProductoID' => 'Producto',
            'UnidadXLote' => 'Unidades en el Lote',
            'FechaInicio' => 'Fecha de Inicio',
            'FechaFin' => 'Fecha de Fin',
            'Status' => 'Estatus',
            'FechaStatusFin' => 'Fecha de Finalización Real',
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
