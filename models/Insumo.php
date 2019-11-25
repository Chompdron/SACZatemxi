<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "insumo".
 *
 * @property int $InsumoID
 * @property string $Descripcion
 * @property int $UnidadPresentacionID
 * @property double $Stock
 * @property double $PrecioXUnidad
 * @property int $ProveedorID
 */
class Insumo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'insumo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Descripcion', 'UnidadPresentacionID', 'Stock', 'PrecioXUnidad'], 'required'],
            [['Stock', 'PrecioXUnidad'], 'number'],
            [['Descripcion','UnidadPresentacionID', 'ProveedorID'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'InsumoID' => 'Insumo ID',
            'Descripcion' => 'Descripción',
            'UnidadPresentacionID' => 'Unidad de Presentacion',
            'Stock' => 'Stock',
            'PrecioXUnidad' => 'Precio X Unidad',
            'ProveedorID' => 'Proveedor ID',
        ];
    }
       /**
    * @return \yii\db\ActiveQuery
    */
    public function getUnidadPresentacion(){
        return $this->hasOne(Unidadpresentacion::className(),['UnidadPresentacionID'=>'UnidadPresentacionID'])->one();;  
      }
    
    public function getProveedor(){
        return $this->hasOne(Proveedor::className(),['ProveedorID'=>'ProveedorID'])->one();;  
      }
}
