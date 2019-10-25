<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $RoleID
 * @property string $Nombre
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'RoleID' => 'Role ID',
            'Nombre' => 'Nombre',
        ];
    }
}
