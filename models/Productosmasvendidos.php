<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productosmasvendidos".
 *
 * @property string $Nombre
 * @property string $ven
 */
class Productosmasvendidos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productosmasvendidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['ven'], 'number'],
            [['Nombre'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Nombre' => 'Nombre',
            'ven' => 'Ven',
        ];
    }
}
