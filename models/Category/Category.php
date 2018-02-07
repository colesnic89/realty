<?php

namespace app\models\Category;

use Yii;

/**
 * This is the model class for table "Category".
 *
 * @property int $ID
 * @property int $ParentID
 *
 * @property ObjectCategory[] $objectCategories
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ParentID'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ParentID' => Yii::t('app', 'Parent ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectCategories()
    {
        return $this->hasMany(ObjectCategory::className(), ['CategoryID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}
