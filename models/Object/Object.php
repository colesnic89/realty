<?php

namespace app\models\Object;

use Yii;
use yii\db\Expression;
use app\models\User\User;
use app\models\ObjectCategory\ObjectCategory;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\models\Object\ObjectStatusEnum;
use app\models\ObjectImage\ObjectImage;

/**
 * This is the model class for table "Object".
 *
 * @property int $ID
 * @property string $Price
 * @property string $Currency
 * @property string $Title
 * @property string $Description
 * @property int $IsMortgage
 * @property string $CreatedAt
 * @property int $CreatedBy
 * @property string $Status
 *
 * @property User $createdBy
 * @property ObjectCategory[] $objectCategories
 * @property ObjectImage[] $objectImages
 */
class Object extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Object';
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'CreatedAt',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'CreatedBy',
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Price', 'Currency', 'Title', 'Status'], 'required'],
            [['Price'], 'number'],
            [['Currency'], 'string', 'max' => 3],
            [['Description'], 'string'],
            [['IsMortgage'], 'default', 'value' => 0],
            [['IsMortgage', 'CreatedBy'], 'integer'],
            [['CreatedAt'], 'safe'],
            [['Title'], 'string', 'max' => 255],
            [['Status'], 'string', 'max' => 20],
            [['Status'], 'in', 'range' => ObjectStatusEnum::getList(true)],
            [['CreatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['CreatedBy' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'Price' => Yii::t('app', 'Price'),
            'Title' => Yii::t('app', 'Title'),
            'Description' => Yii::t('app', 'Description'),
            'IsMortgage' => Yii::t('app', 'Is Mortgage'),
            'CreatedAt' => Yii::t('app', 'Created At'),
            'CreatedBy' => Yii::t('app', 'Created By'),
            'Status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['ID' => 'CreatedBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectCategories()
    {
        return $this->hasMany(ObjectCategory::className(), ['ObjectID' => 'ID']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectImages()
    {
        return $this->hasMany(ObjectImage::className(), ['ObjectID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return ObjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ObjectQuery(get_called_class());
    }
}
