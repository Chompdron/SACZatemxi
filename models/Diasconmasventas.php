<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diasconmasventas".
 *
 * @property string $fecha
 * @property int $Ventas
 */
class Diasconmasventas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diasconmasventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'required'],
            [['fecha'], 'safe'],
            [['Ventas'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fecha' => 'Fecha',
            'Ventas' => 'Ventas',
        ];
    }
}
