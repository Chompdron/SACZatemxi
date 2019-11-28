<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property int $EmpleadoID
 * @property string $Nombre
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
            [['Nombre', 'UserID'], 'required'],
            [['HorasxSem', 'PagoxHrs'], 'number'],
            [['UserID'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EmpleadoID' => 'Empleado',
            'Nombre' => 'Nombre Completo',
            'HorasxSem' => 'Horas por Semana',
            'PagoxHrs' => 'Pago por Hora',
            'UserID' => 'Nombre de Usuario',
        ];
    }
    
        /**
    * @return \yii\db\ActiveQuery
    */
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'UserID']);  
      }
}
