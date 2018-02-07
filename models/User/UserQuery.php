<?php

namespace app\models\User;

use app\models\User\UserStatusEnum;

/**
 * This is the ActiveQuery class for [[User]].
 *
 * @see User
 */
class UserQuery extends \yii\db\ActiveQuery
{

    /**
     * Return only active users
     * @return User[]|array
     */
    public function active()
    {
        return $this->andWhere(['Status' => UserStatusEnum::ACTIVE]);
    }

    /**
     * @inheritdoc
     * @return User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @inheritdoc
     * @return User|null
     */
    public function findByUsername($username)
    {
        return $this->where(['Email' => $username])->orWhere(['NickName' => $username])->limit(1)->one();
    }

}