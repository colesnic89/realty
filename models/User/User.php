<?php

namespace app\models\User;

use Yii;
use yii\db\Expression;
use app\models\User\UserStatusEnum;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "User".
 *
 * @property int $ID
 * @property string $Email
 * @property string $Password
 * @property string $NickName
 * @property string $FirstName
 * @property string $LastName
 * @property string $RegistrationDate
 * @property string $AuthKey
 * @property string $Type
 * @property string $Status
 * 
 * @property string $username - user email or nickname
 */
class User extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'RegistrationDate',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Email', 'Password', 'NickName', 'FirstName', 'LastName', 'Type', 'Status'], 'required'],
            [['Email', 'FirstName', 'LastName'], 'string', 'max' => 255],
            [['Password', 'NickName', 'AuthKey'], 'string', 'max' => 50],
            [['Type', 'Status'], 'string', 'max' => 20],
            [['Status'], 'in', 'range' => UserStatusEnum::getList(true)],
            [['Type'], 'in', 'range' => UserTypeEnum::getList(true)],
            [['Email'], 'email'],
            [['Email'], 'unique'],
            [['NickName'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'               => Yii::t('app', 'ID'),
            'Email'            => Yii::t('app', 'Email'),
            'Password'         => Yii::t('app', 'Password'),
            'NickName'         => Yii::t('app', 'Nick Name'),
            'FirstName'        => Yii::t('app', 'First Name'),
            'LastName'         => Yii::t('app', 'Last Name'),
            'RegistrationDate' => Yii::t('app', 'Registration Date'),
            'Status'           => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public function getUsername()
    {
        return empty($this->NickName) ? $this->Email : $this->NickName;
    }
    
    public function beforeSave($insert)
    {
        if ($this->ID === 1) {
            $this->addError('Email', 'Super Admin will never die :)');
            return false;
        }
        return parent::beforeSave($insert);
    }
    
    public function beforeDelete()
    {
        if ($this->ID === 1) {
            $this->addError('Email', 'Super Admin will never die :)');
            return false;
        }
        return parent::beforeDelete();
    }

}