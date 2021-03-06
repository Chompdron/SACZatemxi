<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "insumosalida".
 *
 * @property int $InsumoID
 * @property string $FechaInicio
 * @property double $UnidadXLote
 */
class Insumosalida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'insumosalida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['InsumoID'], 'integer'],
            [['FechaInicio', 'UnidadXLote'], 'required'],
            [['FechaInicio'], 'safe'],
            [['UnidadXLote'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'InsumoID' => 'Insumo',
            'FechaInicio' => 'Fecha de inicio',
            'UnidadXLote' => 'Unidades en el lote',
        ];
    }
    public function getUnidadPresentacion(){
        return $this->hasOne(Unidadpresentacion::className(),['UnidadPresentacionID'=>'UnidadPresentacionID'])->one(); 
      }
    
    public function getInsumo(){
        return $this->hasOne(Insumo::className(),['InsumoID'=>'InsumoID'])->one();
      }

}
