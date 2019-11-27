<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "insumo".
 *
 * @property int $InsumoID
 * @property string $Descripcion
 * @property int $UnidadPresentacionID
 * @property int $Stock
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
            [['UnidadPresentacionID', 'Stock', 'ProveedorID'], 'integer'],
            [['PrecioXUnidad'], 'number'],
            [['Descripcion'], 'string', 'max' => 255],
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
            'UnidadPresentacionID' => 'Unidad Presentacion ID',
            'Stock' => 'Stock',
            'PrecioXUnidad' => 'Precio X Unidad',
            'ProveedorID' => 'Proveedor ID',
        ];
    }
    public function getUnidadPresentacion(){
        return $this->hasOne(Unidadpresentacion::className(),['UnidadPresentacionID'=>'UnidadPresentacionID'])->one(); 
      }
    
    public function getProveedor(){
        return $this->hasOne(Proveedor::className(),['ProveedorID'=>'ProveedorID'])->one();
      }
}

