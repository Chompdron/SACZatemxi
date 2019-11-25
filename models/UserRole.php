<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property int $id
 * @property int $UserID
 * @property int $RoleID
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UserID', 'RoleID'], 'required'],
            [['UserID', 'RoleID'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'UserID' => 'User ID',
            'RoleID' => 'Role ID',
        ];
    }
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getUser(){
      return $this->hasOne(User::className(),['id'=>'UserID']);  
    }
    
    
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getRole(){
      return $this->hasOne(Role::className(),['RoleID'=>'RoleID']);  
    }
}
