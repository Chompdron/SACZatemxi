<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property int $EmpleadoID
 * @property double $HorasxSem
 * @property double $PagoxHrs
 * @property int $UserID
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['HorasxSem', 'PagoxHrs'], 'number'],
            [['UserID'], 'required'],
            [['UserID'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EmpleadoID' => 'Empleado ID',
            'HorasxSem' => 'Horasx Sem',
            'PagoxHrs' => 'Pagox Hrs',
            'UserID' => 'User ID',
        ];
    }
}
