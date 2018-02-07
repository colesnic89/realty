<?php

namespace app\models\ObjectCategory;

use Yii;
use app\models\Object\Object;

/**
 * This is the model class for table "ObjectCategory".
 *
 * @property int $ID
 * @property int $ObjectID
 * @property int $CategoryID
 *
 * @property Category $category
 * @property Object $object
 */
class ObjectCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjectCategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ObjectID', 'CategoryID'], 'integer'],
            [['CategoryID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['CategoryID' => 'ID']],
            [['ObjectID'], 'exist', 'skipOnError' => true, 'targetClass' => Object::className(), 'targetAttribute' => ['ObjectID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ObjectID' => Yii::t('app', 'Object ID'),
            'CategoryID' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['ID' => 'CategoryID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObject()
    {
        return $this->hasOne(Object::className(), ['ID' => 'ObjectID']);
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
