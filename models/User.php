<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $email;
    public $level;
    public $status;
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {

        $user = Users::findOne($id);
        if (count($user)) {
            return new static($user);
        }
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        $user = Users::find()->where(['authKey' => $token])->one();

        if (count($user)) {
            return new static($user);
        } 
        // foreach (self::$users as $user) {
        //     if ($user['accessToken'] === $token) {
        //         return new static($user);
        //     }
        // }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        $user = Users::find()->where(['username' => $username])->one();

        if (count($user)) {
            return new static($user);
        }
        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
