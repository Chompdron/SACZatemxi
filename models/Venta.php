<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property int $VentaID
 * @property string $Fecha
 * @property double $Total
 * @property double $Descuento
 * @property int $ClienteID
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha', 'Total', 'ClienteID'], 'required'],
            [['Fecha'], 'safe'],
            [['Total', 'Descuento'], 'number'],
            [['ClienteID'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'VentaID' => 'ID de Venta',
            'Fecha' => 'Fecha',
            'Total' => 'Total',
            'Descuento' => 'Descuento',
            'ClienteID' => 'ID del Cliente',
        ];
    }

    public function getCliente(){
        return $this->hasOne(Cliente::className(),['ClienteID'=>'ClienteID'])->one();  
    }
}
