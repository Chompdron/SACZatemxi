<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fechaconsulta".
 *
 * @property int $FechaConsultaID
 * @property string $FechaInicio
 * @property string $FechaFin
 */
class Fechaconsulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fechaconsulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FechaInicio', 'FechaFin'], 'required'],
            [['FechaInicio', 'FechaFin'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'FechaConsultaID' => 'Fecha Consulta ID',
            'FechaInicio' => 'Fecha Inicio',
            'FechaFin' => 'Fecha Fin',
        ];
    }
}
