<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $level
 * @property string $status
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'level'], 'required'],
            [['username', 'email', 'password'], 'string', 'max' => 50, 'on' => 'create'],
            [['authKey'], 'string', 'max' => 7, 'on' => 'create'],
            [['level', 'status'], 'string', 'max' => 2, 'on' => 'create'],
            [['username'], 'unique'],
            [['email'], 'unique'],
            ['email', 'email'],
            [['authKey'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'level' => 'Level',
            'status' => 'Status',
        ];
    }
}
