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
            [['UnidadPresentacionID'], 'integer'],
            [['Stock', 'PrecioXUnidad'], 'number'],
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
        ];
    }

       /**
    * @return \yii\db\ActiveQuery
    */
    public function getUnidadPresentacion(){
        return $this->hasOne(Unidadpresentacion::className(),['UnidadPresentacionID'=>'UnidadPresentacionID'])->one();;  
      }

}
