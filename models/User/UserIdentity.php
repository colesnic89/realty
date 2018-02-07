<?php

namespace app\models\User;

use app\models\User\User;
use yii\web\IdentityInterface;

class UserIdentity extends User implements IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

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
        return self::find()->findByUsername($username);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->AuthKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->AuthKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->Password === $password;
    }

}